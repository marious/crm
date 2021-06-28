<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => env('ADMIN_PREFIX'), 'middleware' => ['auth', 'authorize']], function () {
    include __DIR__ . DIRECTORY_SEPARATOR . 'additional.php';
});


Route::group(['prefix' => env('ADMIN_PREFIX') . '/users', 'middleware' => 'guest'], function () {
    include_route_files(__DIR__ . '/login/');
});
