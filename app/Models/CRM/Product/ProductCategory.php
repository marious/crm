<?php

namespace App\Models\CRM\Product;

use App\Models\Core\BaseModel;
use App\Models\Core\Traits\BooTrait;
use App\Models\Core\Traits\CreatedByRelationship;
use App\Models\CRM\Product\Traits\Rules\ProductCategoryRules;

class ProductCategory extends BaseModel
{
    use ProductCategoryRules,
        CreatedByRelationship,
        BooTrait;

    protected $table = 'product_categories';
    protected $fillable = ['name', 'created_by'];


}
