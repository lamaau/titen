<?php

use App\Http\Controllers\Setting\ModuleController;
use App\Http\Controllers\Setting\ModuleUploadController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::prefix('setting')->as('setting.')->group(fn (): array => [
    Route::get('/module', ModuleController::class),
    Route::post('/module/upload', ModuleUploadController::class),
]);
