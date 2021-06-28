<?php

use App\Helpers\Core\General\SanitizerHelper;

if (!function_exists('sanitize_data')) {
    
    function sanitize_data($value) 
    {
        return resolve(SanitizerHelper::class)->filterData($value);
    }
}