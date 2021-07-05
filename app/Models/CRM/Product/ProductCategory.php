<?php

namespace App\Models\CRM\Product;

use App\Models\Core\BaseModel;

class ProductCategory extends BaseModel
{
    protected $table = 'product_categories';
    protected $fillable = ['name', 'created_by'];

    public static function getProductCategory()
    {

    }
}
