<?php

use App\Http\Controllers\Api\Setting\RoleJsonController;
use Illuminate\Support\Facades\Route;

Route::resource('role', RoleJsonController::class);
