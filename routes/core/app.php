<?php

use App\Http\Controllers\Setting\SettingController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'app'], function () {
    Route::get('settings', [SettingController::class, 'index'])
            ->name('settings.index');
});
