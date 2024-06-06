<?php

namespace App\Http\Controllers;

use App\Http\Resources\OperationResource;
use App\Http\Resources\ResultResource;
use App\Http\Resources\SuggestionResource;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Result;
use App\Models\Suggestion;
use App\Models\Operation;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // Accounts
    public function getAllUsers(Request $request) {
        $validator = Validator::make($request->all(), [
            'role_id' => 'nullable|numeric',
            'term' => 'nullable|string',
            'sort' => 'nullable|in:most_recent,less_recent,email,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $users = User::query();

        // role filter
        if ($request->filled('role_id')) {
            $users->where('role_id', 'like', $request->role_id);
        }

        // term filter
        if ($request->filled('term')) {
            $terms = explode(' ', $request->term);
            foreach ($terms as $term) {
                $users->where('firstname', 'like', '%' . $term . '%');
            };
        }

        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'most_recent':
                    $users->orderBy('created_at', 'desc');
                    break;
                case 'less_recent':
                    $users->orderBy('created_at', 'asc');
                    break;
                case 'email':
                    $users->orderBy('email');
                    break;
                case 'id':
                    $users->orderBy('id');
                    break;
            }
        }

        return response()->json(['data' => UserResource::collection($users->get())], 200);
    }

    public function deleteUser($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted'], 200);
    }


    // Results
    public function getAllResults() {
        return response()->json(['data' => ResultResource::collection(Result::all())], 200);
    }

    // Answers
    public function getUserAnswers() {
        $questions = Question::with('answers.user')->get();
        return response()->json(['data' => $questions], 200);
    }

    // Questions & Answers
    /* Questions */
    public function postQuestion(Request $request) {
        $validator = Validator::make($request->all(), [
            'question' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'error adding question'], 422);
        }

        $question = new Question();
        $question->question = $request->input('question');
        $question->save();

        return response()->json(['message' => 'Question has been added'], 201);
    }

    public function patchQuestion(Request $request) {
        $validator = Validator::make($request->all(), [
            'question_id' => 'required|numeric|exists:questions,id',
            'question' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $question = Question::findOrFail($request->input('question_id'));
        
        if ($request->filled('question')) $question->question = $request->input('question');

        $question->save();

        return response()->json(['message' => 'Question has been updated'], 200);
    }

    public function deleteQuestion($id) {
        $question = Question::findOrFail($id);
        $question->delete();

        return response()->json(['message' => 'Question has been deleted'], 200);
    }

    /* Answers */
    public function postAnswer(Request $request) {
        $validator = Validator::make($request->all(), [
            'answer' => 'required|string',
            'weight' => 'required|numeric',
            'question_id' => 'required|numeric|exists:questions,id',
            'specialisation_id' => 'required|numeric|exists:specialisations,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $answer = new Answer();
        $answer->answer = $request->input('answer');
        $answer->weight = $request->input('weight');
        $answer->question_id = $request->input('question_id');
        $answer->specialisation_id = $request->input('specialisation_id');
        $answer->save();

        return response()->json(['message' => 'Answer has been added'], 201);
    }

    public function patchAnswer(Request $request) {
        $validator = Validator::make($request->all(), [
            'answer_id' => 'required|numeric|exists:answers,id',
            'answer' => 'required|string',
            'weight' => 'required|numeric',
            'specialisation_id' => 'required|numeric|exists:specialisations,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $answer = Answer::findOrFail($request->input('answer_id'));
        
        if ($request->filled('answer')) $answer->answer = $request->input('answer');
        if ($request->filled('weight')) $answer->weight = $request->input('weight');
        if ($request->filled('specialisation_id')) $answer->specialisation_id = $request->input('specialisation_id');

        $answer->save();

        return response()->json(['message' => 'Answer has been updated'], 200);
    }

    public function deleteAnswer($id) {
        $answer = Answer::findOrFail($id);
        $answer->delete();

        return response()->json(['message' => 'Answer has been deleted'], 200);
    }

    // Operations
    public function getOperations() {
        return response()->json(['data' => OperationResource::collection(Operation::orderBy('id')->get())], 200);
    }

    // Suggestions
    public function getSuggestions() {
        return response()->json(['data' => SuggestionResource::collection(Suggestion::all())], 200);
    }

    public function getUserSuggestions(Request $request) {
        $user = $request->user();
        return response()->json(['data' => SuggestionResource::collection(Suggestion::where('user_id', $user->id)->get())], 200);
    }

    public function postSuggestions(Request $request) {
        $validator = Validator::make($request->all(), [
            'operation_id' => 'required|numeric|exists:operations,id',
            'new_value' => 'nullable|string',
            'question_id' => 'nullable|numeric|exists:questions,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $user = $request->user();
        $suggestion = new Suggestion();

        $suggestion->operation_id = $request->input('operation_id');
        $suggestion->new_value = $request->filled('new_value') ? $request->new_value : null;
        $suggestion->question_id = $request->filled('question_id') ? $request->question_id : null;
        $suggestion->user_id = $user->id;

        $suggestion->save();

        return response()->json(['message' => 'Suggestion has been created'], 201);
    }

    public function deleteSuggestions(Suggestion $suggestion) {
        //$suggestion = Suggestion::findOrFail($id);
        $suggestion->delete();

        return response()->json(['message' => 'Suggestion has been deleted'], 200);
    }
}
