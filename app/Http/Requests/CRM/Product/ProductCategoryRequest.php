<?php

namespace App\Http\Requests\CRM\Product;

use App\Http\Requests\BaseRequest;
use App\Models\CRM\Product\ProductCategory;

class ProductCategoryRequest extends BaseRequest
{
    public function rules()
    {
        return $this->initRules(new ProductCategory());
    }
}
