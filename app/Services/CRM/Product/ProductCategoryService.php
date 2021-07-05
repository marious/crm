<?php

namespace App\Services\CRM\Product;

use App\Models\CRM\Product\ProductCategory;
use App\Services\ApplicationBaseService;

class ProductCategoryService extends ApplicationBaseService
{
    public function __construct(ProductCategory $category)
    {
        $this->model = $category;
    }
}
