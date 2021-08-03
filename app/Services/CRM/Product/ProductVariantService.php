<?php

namespace App\Services\CRM\Product;

use App\Models\CRM\Product\ProductVariant;
use App\Services\ApplicationBaseService;

class ProductVariantService extends ApplicationBaseService
{
    public function __construct(ProductVariant $productVariant)
    {
        $this->model = $productVariant;
    }
}
