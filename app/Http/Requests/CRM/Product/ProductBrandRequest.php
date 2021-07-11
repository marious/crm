<?php

namespace App\Http\Requests\CRM\Product;

use App\Http\Requests\BaseRequest;
use App\Models\CRM\Product\ProductBrand;

class ProductBrandRequest extends BaseRequest
{
    public function rules()
    {
        return $this->initRules(new ProductBrand());
    }
}
