<?php

namespace App\Http\Requests;

use App\Exceptions\GeneralException;
use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function initRules($model)
    {
        if (!is_object($model)) {
            throw new GeneralException('This is not an object');
        }

        switch (strtolower($this->method())) {
            case 'post':
                return $model->createdRules();
            case 'patch':
            case 'put':
                return $model->updatedRules();
            default:
                return [];
        }
    }

}
