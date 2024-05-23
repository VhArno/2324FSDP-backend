<?php

use App\Http\Controllers\ResultController;
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

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');

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

// Get specialisations
Route::get('/specialisations', [QuestionController::class, 'getSpecialisations']);

// Admin routes
Route::group(['prefix' => '/admin', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/users', [AuthController::class, 'getAllUsers']); // role admins
    Route::post('/questions', [QuestionController::class, 'addQuestions']); // role admins
});