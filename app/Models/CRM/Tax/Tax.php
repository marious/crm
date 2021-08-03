<?php

namespace App\Models\CRM\Tax;

use App\Models\Core\BaseModel;

class Tax extends BaseModel
{
    protected $fillable = ['name', 'percentage', 'is_default'];


}
