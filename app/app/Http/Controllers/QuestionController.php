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
        return response(['data' => QuestionResource::collection(Question::all())]);
    }

    public function getQuestion($id) {
        return response(['data' => new QuestionResource(Question::findOrFail($id))]);
    }

    public function getSpecialisations() {
        return response(['data' => SpecialisationResource::collection(Specialisation::all())]);
    }
}
