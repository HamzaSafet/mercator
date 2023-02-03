<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateOperationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('operation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'min:3',
                'max:32',
                'required',
                //'unique:operations,name,' . request()->route('operation')->id,
                'unique:operations,name,'.request()->route('operation')->id.',id,deleted_at,NULL',
            ],
            'actors.*' => [
                'integer',
            ],
            'actors' => [
                'array',
            ],
            'tasks.*' => [
                'integer',
            ],
            'tasks' => [
                'array',
            ],
        ];
    }
}
