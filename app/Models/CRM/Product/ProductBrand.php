<?php

namespace App\Models\CRM\Product;

use App\Models\Core\BaseModel;
use App\Models\Core\Traits\BooTrait;
use App\Models\Core\Traits\CreatedByRelationship;
use App\Models\CRM\Product\Traits\Rules\ProductBrandRules;

class ProductBrand extends BaseModel
{
    use CreatedByRelationship,
        BooTrait,
        ProductBrandRules;

    protected $table = 'product_brands';
    protected $fillable = ['name', 'created_by'];
}
