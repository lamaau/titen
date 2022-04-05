<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])->group(function () {
    Route::resource('post', PostController::class);
    Route::resource('tag', TagController::class);
    Route::resource('category', CategoryController::class);
});
