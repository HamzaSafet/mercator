<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'email' => [
                'required',
                'unique:users,email,NULL,id,deleted_at,NULL',
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'granularity' => [
                'required',
                'nullable',
                'integer',
                'min:1',
                'max:3',
            ],
        ];
    }
}
