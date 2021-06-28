<?php

namespace App\Models\Core\Setting;

use App\Models\Core\BaseModel;

class Setting extends BaseModel
{
    protected $fillable = [
        'name', 'value', 'context', 'autoload', 'public', 'settingable_type', 
            'settingable_id'
    ];

    protected static $logAttributes = [
        'name', 'context'
    ];
}
