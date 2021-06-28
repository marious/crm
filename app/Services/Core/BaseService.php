<?php


namespace App\Services\Core;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class BaseService
{
    protected $model;

    protected array $attributes = [];


    public function setModel(Model $model): BaseService
    {
        $this->model = $model;
        return $this;
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function save($options = [])
    {
        $attributes = count($options) ? $options : request()->all();

        $this->model
            ->fill($this->getFillAble($attributes))
            ->save();

        return $this->model;
    }

    public function find($id)
    {
        return $this->model =  $this->model::query()->find($id);
    }

    public function setAttributes(array $attributes): BaseService
    {
        $this->attributes = $attributes;
        return $this;
    }

    public function setAttrs(array $attrs): BaseService
    {
        $this->attributes = $attrs;
        return $this;
    }

    public function setAttribute($key, $value): BaseService
    {
        $this->attributes[$key] = $value;
        return $this;
    }

    public function setAttr($key, $value): BaseService
    {
        $this->attributes[$key] = $value;
        return $this;
    }

    public function mergeAttributes(array $attrs): BaseService
    {

        $this->attributes = array_merge($this->attributes, $attrs);

        return $this;
    }

    public function mergeAttrs(array $attrs): BaseService
    {

        $this->attributes = array_merge($this->attributes, $attrs);

        return $this;
    }

    public function getAttributes($columns = null): array
    {
        $columns = is_array($columns) ? $columns : func_get_args();

        if (count($columns)) {
            return Arr::only($this->attributes, $columns);
        }

        return $this->attributes;
    }


    public function getAttrs($columns = null): array
    {
        $columns = is_array($columns) ? $columns : func_get_args();

        if (count($columns)) {
            return Arr::only($this->attributes, $columns);
        }

        return $this->attributes;
    }

    public function getAttribute($key)
    {
        return isset($this->attributes[$key]) ? $this->attributes[$key] : null;
    }

    public function getAttr($key)
    {
        return isset($this->attributes[$key]) ? $this->attributes[$key] : null;
    }

    public function getFillAble($parameters = [])
    {
        return count($this->attributes) ? $this->attributes : $parameters;
    }

    public function __call($method, $arguments)
    {
        return $this->model->{$method}(...$arguments);
    }

}
