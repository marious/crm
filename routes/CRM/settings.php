<?php

use App\Http\Controllers\CRM\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('settings/page', [FrontendController::class, 'settingPages'])
        ->name('settings.page');

