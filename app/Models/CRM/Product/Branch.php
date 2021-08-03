<?php

namespace App\Models\CRM\Product;

use App\Models\Core\BaseModel;

class Branch extends BaseModel
{
    protected $fillable = ['name', 'branch_type', 'is_default', 'created_by'];


    public static function getBranch($branchId)
    {
        return Branch::select('*')->whereIn('id', explode(',', $branchId))->get();
    }
}
