<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatePhysicalServerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('physical_server_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'min:3',
                'max:32',
                'required',
                //'unique:physical_servers,name,' . request()->route('physical_server')->id,
                'unique:physical_servers,name,'.request()->route('physical_server')->id.',id,deleted_at,NULL',
            ],
        ];
    }
}
