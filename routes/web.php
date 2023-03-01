<?php

use Illuminate\Support\Facades\Route;

Route::get('/', config('modules.landing_page_controller'));

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
