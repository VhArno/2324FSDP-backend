<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ResultController;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::group(['prefix' => '/user', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [AuthController::class, 'getUser']);
    Route::patch('/', [AuthController::class, 'patchUser']);
    Route::delete('/', [AuthController::class, 'deleteUser']);

    Route::get('/results', [ResultController::class, 'getUserResults']);
    Route::post('/results', [ResultController::class, 'postResult']);
});

// mail test results
Route::post('/results/mail', [ResultController::class, 'sendResult']);

Route::post('/results/answers', [ResultController::class, 'postUserAnswers']);

// Get questions & answers for test
Route::get('/questions', [QuestionController::class, 'getQuestions']);
Route::get('/questions/{id}', [QuestionController::class, 'getQuestion'])->whereNumber('id');

// Get specialisations
Route::get('/specialisations', [QuestionController::class, 'getSpecialisations']);

// Admin routes
Route::group(['prefix' => '/admin', 'middleware' => 'auth:sanctum'], function () { // role admins
    // Accounts
    Route::get('/users', [AdminController::class, 'getAllUsers'])->middleware('can:viewAny,App\Models\User');
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->middleware('can:delete,App\Models\User')->whereNumber('id');

    //Results
    Route::get('/results', [AdminController::class, 'getAllResults'])->middleware('can:viewAny,App\Models\User');

    // Answers
    Route::get('/users/answers', [AdminController::class, 'getUserAnswers'])->middleware('can:viewAny,App\Models\User');

    // Answers & questions
    Route::post('/questions', [AdminController::class, 'postQuestion'])->middleware('can:create, App\Models\Question');
    Route::patch('/questions', [AdminController::class, 'patchQuestion'])->middleware('can:update,App\Models\Question');
    Route::delete('/questions/{id}', [AdminController::class, 'deleteQuestion'])->middleware('can:delete,App\Models\Question')->whereNumber('id');

    Route::post('/answers', [AdminController::class, 'postAnswer'])->middleware('can:create,App\Models\Answer');
    Route::patch('/answers', [AdminController::class, 'patchAnswer'])->middleware('can:update,App\Models\Answer');
    Route::delete('/answers/{id}', [AdminController::class, 'deleteAnswer'])->middleware('can:delete,App\Models\Answer')->whereNumber('id');

    // Suggestion
    Route::get('/suggestions', [AdminController::class, 'getSuggestions'])->middleware('can:delete,App\Models\Answer');
}); 
