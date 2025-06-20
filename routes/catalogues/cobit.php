<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CobitController;

Route::group(['prefix' => 'cobit', 'as' => 'cobit.'], function () {
    Route::get('/', [CobitController::class, 'index'])->name('index');
    Route::get('/allquestions', [CobitController::class, 'allQuestions'])->name('allQuestions');
    Route::post('asses', [CobitController::class, 'saveCobit'])->name('cobit.save');
});