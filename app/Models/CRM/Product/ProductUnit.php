<?php

namespace App\Models\CRM\Product;

use App\Models\Core\BaseModel;
use App\Models\Core\Traits\BooTrait;
use App\Models\Core\Traits\CreatedByRelationship;
use App\Models\CRM\Product\Traits\Rules\ProductUnitRules;


class ProductUnit extends BaseModel
{
    use ProductUnitRules,
        CreatedByRelationship,
        BooTrait;

    protected $table = 'product_units';
    protected $fillable = ['name', 'short_name', 'created_by'];
}
