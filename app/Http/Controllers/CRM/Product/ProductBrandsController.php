<?php

namespace App\Http\Controllers\CRM\Product;

use App\Filters\CRM\ProductBrandFilter;
use App\Http\Controllers\Controller;
use App\Models\CRM\Product\ProductBrand;
use App\Http\Requests\CRM\Product\ProductBrandRequest as Request;
use App\Services\CRM\Product\ProductBrandService;

class ProductBrandsController extends Controller
{
    public function __construct(ProductBrandService $service, ProductBrandFilter $filter)
    {
        $this->service = $service;
        $this->filter = $filter;
    }

    public function index()
    {
        if (request()->exists('all')) {
            return $this->service->select('id', 'name')->get();
        }

        return $this->service
                    ->filters($this->filter)
                    ->paginate(request('per_page', 15));
    }

    public function store(Request $request)
    {
        $this->service->save();
        return created_responses('product_brand');
    }

    public function show($id)
    {
        return $this->service->find($id);
    }

    public function update(Request $request, ProductBrand $brand)
    {
        $brand->update($request->all());
        return updated_responses('product_brand');
    }

    public function destroy(ProductBrand $brand)
    {
        if ($brand->delete()) {
            return deleted_responses('product_brand');
        }
        return false;
    }
}
