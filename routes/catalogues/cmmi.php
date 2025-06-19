<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CmmiController;

Route::group(['prefix' => 'cmmi', 'as' => 'cmmi.'], function () {
    Route::get('/', [CmmiController::class, 'index'])->name('index');
});