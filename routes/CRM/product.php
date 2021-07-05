<?php

use App\Http\Controllers\CRM\Product\ProductCategoriesController;
use Illuminate\Support\Facades\Route;

//Route::get('product/categories', [ProductCategoriesController::class, 'categories']);
Route::resource('product/categories', ProductCategoriesController::class)
        ->except(['create', 'edit']);
