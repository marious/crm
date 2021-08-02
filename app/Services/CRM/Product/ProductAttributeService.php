<?php

namespace App\Services\CRM\Product;

use App\Models\CRM\Product\ProductAttribute;
use App\Services\ApplicationBaseService;

class ProductAttributeService extends ApplicationBaseService
{
    public function __construct(ProductAttribute $attribute)
    {
        $this->model = $attribute;
    }
}
