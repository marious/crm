<?php

namespace App\Http\Controllers\CRM\Product;

use App\Filters\CRM\ProductAttributeFilter;
use App\Http\Controllers\Controller;
use App\Models\CRM\Product\ProductAttribute;
use App\Services\CRM\Product\ProductAttributeService;
use App\Http\Requests\CRM\Product\ProductAttributeRequest as Request;

class ProductAttributeController extends Controller
{

    public function __construct(ProductAttributeService $service, ProductAttributeFilter $filter)
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
        return created_responses('product_attribute');
    }

    public function show($id)
    {
        return $this->service->find($id);
    }

    public function update(Request $request, ProductAttribute $attribute)
    {
        $attribute->update($request->all());
        return updated_responses('product_attribute');
    }

    public function destroy(ProductAttribute $attribute)
    {
        if ($attribute->delete()) {
            return deleted_responses('product_attribute');
        }
        return false;
    }
}
