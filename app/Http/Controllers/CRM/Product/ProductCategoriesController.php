<?php

namespace App\Http\Controllers\CRM\Product;

use App\Http\Controllers\Controller;
use App\Models\CRM\Product\ProductCategory;
use App\Services\CRM\Product\ProductCategoryService;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    public function __construct(ProductCategoryService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->paginate(request('per_page', 15));
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function update(Request $request, ProductCategory $category)
    {

    }

    public function destroy(ProductCategory $category)
    {

    }
}
