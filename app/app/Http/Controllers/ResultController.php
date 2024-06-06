<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Resources\ResultResource;
use App\Models\Specialisation;
use Carbon\Carbon;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use App\Mail\ResultMail;
use Illuminate\Support\Facades\Mail;

class ResultController extends Controller
{
    function getUserResults(Request $request) {
        $user = $request->user();

        $orderedResults = $user->results()->orderBy('created_at', 'desc')->get();

        return response()->json(['data' => ResultResource::collection($orderedResults)], 200);
    }

    function postResult(Request $request) {
        $validator = Validator::make($request->all(), [
            'description' => 'nullable|string',
            'specialisation_id' => 'required|numeric|exists:specialisations,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid request data'], 422);
        }

        $result = new Result();
        $result->name = 'test';
        $result->description = $request->filled('description') ? $request->input('description') : null;
        $result->specialisation_id = $request->input('specialisation_id');
        $result->user_id = 3;

        $result->save();

        return response()->json(['message' => 'Result has been saved', 'data' => new ResultResource($result)], 201);
    }

    function patchResult(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'nullable|string',
            'result_id' => 'required|numeric|exists:results,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid request data'], 422);
        }

        $user = $request->user();

        $result = Result::findOrFail($request->result_id);
        $result->name = $request->input('name');
        $result->description = $request->filled('description') ? $request->input('description') : null;
        $result->user_id = $user->id;

        $result->save();

        return response()->json(['message' => 'Result has been updated'], 200);
    }

    function sendResult(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'specialisation_id' => 'required|numeric|exists:specialisations,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid request data'], 422);
        }

        $user = $request->user() ? $request->user() : new User();
        $specialisation = Specialisation::findOrFail($request->input('specialisation_id'));

        Mail::to($request->input('email'))->send(new ResultMail($specialisation, $user));

        return response()->json(['message' => 'Email send'], 200);
    }

    function postUserAnswers(Request $request) {
        $validator = Validator::make($request->all(), [
            'question_id' => 'required|numeric|exists:questions,id',
            'answer_id' => 'required|numeric|exists:answers,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid request data'], 422);
        }

        $user = $request->user();
        if (!$user) {
            $user = User::find(3);
        }

        $user->answers()->attach($request->input('answer_id'), [
            'question_id' => $request->input('question_id'),
            'created_at' =>  Carbon::now()
        ]);
        $user->save();

        return response()->json(['message' => 'User answer has been saved'], 201);
    }
}
