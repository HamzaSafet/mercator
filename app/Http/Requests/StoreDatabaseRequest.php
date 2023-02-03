<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreDatabaseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('database_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'min:3',
                'max:32',
                'required',
                //'unique:databases',
                'unique:databases,name,NULL,id,deleted_at,NULL',
            ],
            'entities.*' => [
                'integer',
            ],
            'entities' => [
                'array',
            ],
            'informations.*' => [
                'integer',
            ],
            'informations' => [
                'array',
            ],
            'security_need' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
