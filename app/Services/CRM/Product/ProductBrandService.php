<?php

namespace App\Services\CRM\Product;

use App\Models\CRM\Product\ProductBrand;
use App\Services\ApplicationBaseService;

class ProductBrandService extends ApplicationBaseService
{
    public function __construct(ProductBrand $brand)
    {
        $this->model = $brand;
    }
}
