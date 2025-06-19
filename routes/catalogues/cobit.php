<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CobitController;

Route::group(['prefix' => 'cobit', 'as' => 'cobit.'], function () {
    Route::get('/', [CobitController::class, 'index'])->name('index');
});