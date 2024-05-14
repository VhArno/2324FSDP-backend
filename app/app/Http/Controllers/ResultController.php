<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

class ResultController extends Controller
{
    function getUserResults() {

    }

    function postResult(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'nullable|string',
            'specialisation_id' => 'required|numeric|exists:specialisations,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $user = $request->user();

        $result = new Result();
        $result->name = $request->input('name');
        $result->description = $request->filled('description') ? $request->input('description') : null;
        $result->specialisation_id = $request->input('specialisation_id');
        $result->user_id = $user->id;

        $result->save();

        return response()->json(['message' => 'Result has been saved'], 201);
    }
}
