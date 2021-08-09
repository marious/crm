<?php

namespace App\Http\Controllers\CRM\Product;

use App\Filters\CRM\ProductUnitFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\CRM\Product\ProductUnitRequest as Request;
use App\Models\CRM\Product\ProductUnit;
use App\Services\CRM\Product\ProductUnitService;

class ProductUnitController extends Controller
{
    public function __construct(ProductUnitService $service, ProductUnitFilter $filter)
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
        return created_responses('product_unit');
    }

    public function show($id)
    {
        return $this->service->find($id);
    }

    public function update(Request $request, ProductUnit $unit)
    {
        $unit->update($request->all());
        return updated_responses('product_unit');
    }

    public function destroy(ProductUnit $unit)
    {
        if ($unit->delete()) {
            return deleted_responses('product_unit');
        }
        return  false;

    }
}
