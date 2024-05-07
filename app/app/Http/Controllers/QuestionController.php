<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\QuestionResource;
use App\Models\Question;

class QuestionController extends Controller
{
    public function getQuestions() {
        return response(['data' => QuestionResource::collection(Question::all())]);
    }

    public function addQuestions() {

    }

    public function getSpecialisations() {

    }
}
