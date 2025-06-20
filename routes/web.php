<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;
use \App\Http\Controllers\PdfReportController;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('/cmmi/report/{id}', [PdfReportController::class, 'cmmi'])->name('cmmi.report');
Route::get('/cobit/report/{id}', [PdfReportController::class, 'cobit'])->name('cobit.report');


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
require __DIR__.'/catalogues/cobit.php';
require __DIR__.'/catalogues/cmmi.php';
require __DIR__.'/catalogues/history.php';

