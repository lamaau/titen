<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Post\Http\Controllers\Api\CategoryJsonController;
use Modules\Post\Http\Controllers\Api\TagJsonController;

Route::middleware('auth:api')->get('/post', function (Request $request) {
    return $request->user();
});

Route::prefix('/v1')->group(function () {
    Route::resource('/tag', TagJsonController::class);
    Route::resource('/category', CategoryJsonController::class);
});
