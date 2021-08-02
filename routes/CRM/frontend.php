<?php

use App\Http\Controllers\CRM\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('product/category/list', [FrontendController::class, 'productCategoryList'])
        ->name('product_category.list');

Route::get('product/brand/list', [FrontendController::class, 'productBrandList'])
        ->name('product_brand.list');

Route::get('product/unit/list', [FrontendController::class, 'productUnitList'])
    ->name('product_unit.list');

Route::get('product/attribute/list', [FrontendController::class, 'productAttributeList'])
    ->name('product_attribute.list');
