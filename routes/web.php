<?php
use Illuminate\Support\Facades\Route;

$adminPrefix = env('ADMIN_PREFIX', 'admin');

Route::get('/test', function () {
    echo 'test';
});

Route::redirect('/', $adminPrefix . '/users/login');

Route::group(['prefix' => env('ADMIN_PREFIX'), 'middleware' => ['auth', 'authorize']], function () {
    include __DIR__ . DIRECTORY_SEPARATOR . 'additional.php';
});


Route::group(['prefix' => $adminPrefix . '/users', 'middleware' => 'guest'], function () {
    include_route_files(__DIR__ . '/login/');
});


Route::group(['prefix' => $adminPrefix, 'middleware' => 'admin', 'as' => 'core.'], function () {
    /*
   * (good if you want to allow more than one group in the core,
   * then limit the core features by different roles or permissions)
   *
   * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
   * These routes can not be hit if the password is expired
   */
    include_route_files(__DIR__ . '/core/');
});


/*
 * CRM Related Routes
 * We separated the route files according to the features
 * Such as contact.php for Person & Organization related routes
 */
Route::group(['prefix' => 'crm'], function () {
    include_route_files(__DIR__ . '/CRM/');
});
