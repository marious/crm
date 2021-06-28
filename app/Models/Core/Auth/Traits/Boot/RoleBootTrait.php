<?php

namespace App\Models\Core\Auth\Traits\Boot;

trait RoleBootTrait
{
    public static function boot()
    {
        parent::boot();

        if (!app()->runningInConsole()) {
            static::creating(function ($model) {
                if (!$model->created_by) {
                    return $model->fill([
                        'created_by' => auth()->id,
                    ]);
                }
            });
        }


    }
}
