<?php

namespace App\Repositories\Core;

class BaseRepository
{
    protected $model;

    public function __call($name, $arguments)
    {
        return $this->model->{$name}(...$arguments);
    }
}
