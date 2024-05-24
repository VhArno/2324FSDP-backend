<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request): Response {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response(['message' => 'The user has been authenticated successfully'], 200);
        }
        return response(['message' => 'The provided credentials do not match our records.'], 401);
    }

    public function logout(Request $request): Response {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return response(['message' => 'The user has been logged out successfully'], 200);
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:5',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $user = new User();
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role_id = 3;

        $user->save();

        return response()->json(['message' => 'User has been created'], 201);
    }

    public function getUser(Request $request) {
        return response(['data' => new UserResource($request->user())]);
    }

    public function patchUser(Request $request) {
        $validator = Validator::make($request->all(), [
            'firstname' => 'nullable|string',
            'lastname' => 'nullable|string',
            'email' => 'nullable|string|email|unique:users',
            'password' => 'nullable|string|min:5',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $user = $request->user();

        if ($request->filled('firstname')) $user->firstname = $request->input('firstname');
        if ($request->filled('lastname')) $user->lastname = $request->input('lastname');
        if ($request->filled('email')) $user->email = $request->input('email');
        if ($request->filled('password')) $user->password = $request->input('password');

        $user->save();

        return response()->json(['message' => 'User updated', 200]);
    }

    public function deleteUser(Request $request) {
        $user = $request->user();
        $user->delete();
        return response(['message' => 'User deleted'], 200);
    }
}
