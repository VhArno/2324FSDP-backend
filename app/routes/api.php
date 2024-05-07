<?php

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

Route::get('/user', [AuthController::class, 'getUser'])->middleware('auth:sanctum');
Route::patch('/user', [AuthController::class, 'patchUser'])->middleware('auth:sanctum');
Route::delete('/user', [AuthController::class, 'deleteUser'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/users', [AuthController::class, 'getAllUsers']);

Route::get('/questions', [QuestionController::class, 'getQuestions']);
Route::post('/questions', [QuestionController::class, 'addQuestions']);

Route::get('/specialisations', [QuestionController::class, 'getSpecialisations']);