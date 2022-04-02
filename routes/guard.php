<?php

use App\Http\Controllers\Setting\PermissionController;
use App\Http\Controllers\Setting\RoleController;
use App\Http\Controllers\Setting\UserController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::prefix('setting')->as('setting.')->group(fn (): array => [
    Route::resource('user', UserController::class),
    Route::resource('role', RoleController::class),
    Route::prefix('role')->as('role.')->group(fn (): array => [
        Route::resource('permission', PermissionController::class),
    ]),
]);
