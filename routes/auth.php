<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'create'])->name('login')->middleware('guest');
    Route::post('login', [AuthController::class, 'store'])->name('login.store')->middleware('guest');
    Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');
});
