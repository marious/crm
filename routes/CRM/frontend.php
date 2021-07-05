<?php

use App\Http\Controllers\CRM\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('product/category/list', [FrontendController::class, 'productCategoryList'])
        ->name('product_category.list');
