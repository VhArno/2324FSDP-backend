<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\SpecialisationResource;
use App\Models\Question;
use App\Models\Specialisation;

class QuestionController extends Controller
{
    public function getQuestions() {
        return response()->json(['data' => QuestionResource::collection(Question::all())], 200);
    }

    public function getQuestion($id) {
        return response()->json(['data' => new QuestionResource(Question::findOrFail($id))], 200);
    }

    public function getSpecialisations() {
        return response()->json(['data' => SpecialisationResource::collection(Specialisation::all())], 200);
    }
}
