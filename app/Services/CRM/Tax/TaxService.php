<?php

namespace App\Services\CRM\Tax;

use App\Models\CRM\Tax\Tax;
use App\Services\ApplicationBaseService;

class TaxService extends ApplicationBaseService
{
    public function __construct(Tax $tax)
    {
        $this->model = $tax;
    }

    public function getTotals()
    {
        return $this->model::select('id')->where('is_default', 1)->count();
    }

    public function getTax($columnName, $columnSortedBy, $limit, $offset)
    {
        $count = $this->getTotals();
        $data = $this->model::select('*')->orderBy($columnName, $columnSortedBy)->take($limit)->skip($offset)->get();
        return ['data' => $data, 'count' => $count];
    }

    public function updateDefault()
    {
        return $this->model::where('is_default', 1)->update(['is_default' => 0]);
    }

    public function getDefaultTaxId()
    {
        return $this->model::select('id')->where('is_default', 1)->first()->id;
    }
}
