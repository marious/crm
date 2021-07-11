<?php

namespace App\Models\CRM\Product\Traits\Rules;

trait ProductUnitRules
{
    public function createdRules()
    {
        return [
            'name' => 'required|max:191',
            'short_name' => 'required|max:191',
        ];
    }

    public function updatedRules()
    {
        return [
            'name' => 'required|max:191',
            'short_name' => 'required|max:191',
        ];
    }
}
