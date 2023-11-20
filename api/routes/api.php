<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ListsController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionListController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', AuthController::class . '@login');
Route::post('/logout', AuthController::class . '@logout');

Route::apiResource('subjects', SubjectController::class);
Route::apiResource('questions', QuestionController::class);
Route::apiResource('question-lists', QuestionListController::class);

