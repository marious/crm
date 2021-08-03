<?php


namespace App\Services\CRM\Product;


use App\Models\CRM\Product\Product;
use App\Services\ApplicationBaseService;

class ProductService extends ApplicationBaseService
{

        public function __construct(Product $product)
        {
            $this->model = $product;
        }

}
