<?php

namespace App\Models\CRM\Product;

use App\Models\Core\BaseModel;
use App\Models\Core\Traits\BooTrait;
use App\Models\Core\Traits\CreatedByRelationship;
use App\Models\CRM\Product\Traits\Rules\ProductAttributeRules;

class ProductAttribute extends BaseModel
{
    use ProductAttributeRules,
        CreatedByRelationship,
        BooTrait;


    protected $table = 'product_attributes';
    protected $fillable = ['name', 'created_by'];
}
