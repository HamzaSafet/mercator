<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateActorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('actor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'min:3',
                'max:32',
                'required',
                //'unique:actors,name,' . request()->route('actor')->id,
                'unique:actors,name,'.request()->route('actor')->id.',id,deleted_at,NULL',
            ],
        ];
    }
}
