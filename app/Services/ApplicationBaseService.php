<?php

namespace App\Services;

use App\Helpers\Core\Traits\FileHandler;
use App\Services\Core\BaseService;
use App\Services\CRM\Traits\PaginateTraits;

class ApplicationBaseService extends BaseService
{
    use FileHandler, PaginateTraits;



    public function delete(): self
    {
        $this->model->delete();

        return $this;
    }
}
