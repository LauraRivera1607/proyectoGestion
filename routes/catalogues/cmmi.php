<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CmmiController;

Route::group(['prefix' => 'cmmi', 'as' => 'cmmi.'], function () {
    Route::get('/', [CmmiController::class, 'index'])->name('index');
    Route::get('/asses', [CmmiController::class, 'asses'])->name('asses');
    Route::post('asses', [CmmiController::class, 'save'])->name('save');
});