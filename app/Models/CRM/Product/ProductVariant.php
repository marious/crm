<?php

namespace App\Models\CRM\Product;

use App\Models\Core\BaseModel;

class ProductVariant extends BaseModel
{
    protected $fillable = [
        'sku', 'product_id', 'variant_title', 'attribute_values', 'variant_details', 'purchase_price', 'selling_price',
        'enabled', 'isNotify', 'image_url', 'bar_code_type', 'bar_code', 're_order', 'created_by',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
