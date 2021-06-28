<?php

namespace App\Http\Controllers;

use App\Filters\FilterBuilder;
use App\Services\Core\BaseService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var FilterBuilder
     */
    protected $filter;

    /**
     * @var BaseService
     */
    protected $service;
}
