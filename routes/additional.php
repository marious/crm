<?php

use App\Http\Controllers\Core\Auth\User\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('log-out', [LoginController::class, 'logOut'])->name('auth.log_out');
