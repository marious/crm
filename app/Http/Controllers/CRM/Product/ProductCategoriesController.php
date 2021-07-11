<?php

namespace App\Http\Controllers\CRM\Product;

use App\Filters\CRM\ProductCategoryFilter;
use App\Http\Controllers\Controller;
use App\Models\CRM\Product\ProductCategory;
use App\Services\CRM\Product\ProductCategoryService;
use App\Http\Requests\CRM\Product\ProductCategoryRequest as Request;

class ProductCategoriesController extends Controller
{
    public function __construct(ProductCategoryService $service, ProductCategoryFilter $filter)
    {
        $this->service = $service;
        $this->filter = $filter;
    }

    public function index()
    {
       return $this->service
                    ->filters($this->filter)
                    ->paginate(request('per_page', 15));
    }

    public function store(Request $request)
    {
        $this->service->save();
        return created_responses('product_category');
    }

    public function show($id)
    {
        return $this->service->find($id);
    }

    public function update(Request $request, ProductCategory $category)
    {
        $category->update($request->all());
        return updated_responses('product_category');
    }

    public function destroy(ProductCategory $category)
    {
        if ($category->delete()) {
            return deleted_responses('product_category');
        }

        return  false;
    }
}
