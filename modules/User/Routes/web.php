<?php

use Illuminate\Support\Facades\Route;

Route::prefix('setting')->as('setting.')->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class)->except('show');

    Route::prefix('role')->as('role.')->group(fn (): array => [
        Route::resource('permission', PermissionController::class),
    ]);
});
