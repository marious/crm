<?php

namespace App\Services\CRM\Product;

use App\Models\CRM\Product\ProductUnit;
use App\Services\ApplicationBaseService;

class ProductUnitService extends ApplicationBaseService
{
    public function __construct(ProductUnit $unit)
    {
        $this->model = $unit;
    }
}
