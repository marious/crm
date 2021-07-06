<?php

namespace App\Models\CRM\Product\Traits\Rules;

trait ProductCategoryRules
{
    public function createdRules()
    {
        return [
            'name' => 'required|max:191',
        ];
    }

    public function updatedRules()
    {
        return [
            'name' => 'required|max:191',
        ];
    }
}
