<?php

namespace App\Hooks;

abstract class HookContract
{
    public $model;
    public $relation;
    public $properties;
    public $type;

    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    public function setProperties($properties)
    {
        $this->properties = $properties;
        return $this;
    }


    public function setRelation($relation)
    {
        $this->relation = $relation;
        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

}
