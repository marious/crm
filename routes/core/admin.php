<?php
use App\Http\Controllers\Core\DashboardController;
use Illuminate\Support\Facades\Route;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/' . env('ADMIN_PREFIX', 'admin').'/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
