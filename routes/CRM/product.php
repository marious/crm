<?php

use App\Http\Controllers\CRM\Product\ProductAttributeController;
use App\Http\Controllers\CRM\Product\ProductCategoriesController;
use App\Http\Controllers\CRM\Product\ProductBrandsController;
use App\Http\Controllers\CRM\Product\ProductController;
use App\Http\Controllers\CRM\Product\ProductUnitController;
use Illuminate\Support\Facades\Route;

Route::get('products/product_type_list', [ProductController::class, 'getProductTypeList'])
    ->name('products.product_list');

Route::resource('products', ProductController::class);

//Route::get('product/categories', [ProductCategoriesController::class, 'categories']);
Route::resource('product/categories', ProductCategoriesController::class)
        ->except(['create', 'edit']);

Route::resource('product/brands', ProductBrandsController::class)
        ->except(['create', 'edit']);

Route::resource('product/units', ProductUnitController::class)
    ->except(['create', 'edit']);

Route::resource('product/attributes', ProductAttributeController::class)
    ->except(['create', 'edit']);

