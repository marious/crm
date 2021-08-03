<?php

namespace App\Models\CRM\Product;

use App\Models\Core\BaseModel;

class Product extends BaseModel
{
    protected $fillable = [
        'title', 'description', 'category_id', 'brand_id', 'unit_id', 'taxable', 'tax_type', 'tax_id',
        'product_type', 'branch_id', 'image_url', 'created_by',
    ];


    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id', 'id');
    }
}
