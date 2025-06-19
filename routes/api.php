<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FrameworkController;
use App\Http\Controllers\Api\QuestionnaireController;

Route::get('/frameworks', [FrameworkController::class, 'index']);
Route::get('/processes/{id}/questions', [QuestionnaireController::class, 'questionsByProcess']);
Route::post('/answers', [QuestionnaireController::class, 'storeAnswers']);
