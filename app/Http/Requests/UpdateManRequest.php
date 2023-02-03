<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateManRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('man_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'min:3',
                'max:32',
                'required',
                //'unique:mans,name,' . request()->route('man')->id,
                'unique:mans,name,'.request()->route('man')->id.',id,deleted_at,NULL',
            ],
            'lans.*' => [
                'integer',
            ],
            'lans' => [
                'array',
            ],
        ];
    }
}
