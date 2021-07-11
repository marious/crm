<?php

use App\Http\Controllers\CRM\Product\ProductCategoriesController;
use App\Http\Controllers\CRM\Product\ProductBrandsController;
use App\Http\Controllers\CRM\Product\ProductUnitController;
use Illuminate\Support\Facades\Route;

//Route::get('product/categories', [ProductCategoriesController::class, 'categories']);
Route::resource('product/categories', ProductCategoriesController::class)
        ->except(['create', 'edit']);

Route::resource('product/brands', ProductBrandsController::class)
        ->except(['create', 'edit']);

Route::resource('product/units', ProductUnitController::class)
    ->except(['create', 'edit']);

