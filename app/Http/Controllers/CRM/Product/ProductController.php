<?php
namespace App\Http\Controllers\CRM\Product;

use App\Filters\CRM\ProductFilter;
use App\Http\Controllers\Controller;
use App\Services\CRM\Product\ProductService;

class ProductController extends Controller
{
    public function __construct(ProductService $service, ProductFilter $filter)
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

    public function create()
    {
        return view('crm.products.create_product');
    }

    public function store()
    {

    }

    public function show($id)
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
