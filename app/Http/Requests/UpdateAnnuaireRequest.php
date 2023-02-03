<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateAnnuaireRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('annuaire_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'min:3',
                'max:32',
                'required',
                //'unique:annuaires,name,' . request()->route('annuaire')->id,
                'unique:annuaires,name,'.request()->route('annuaire')->id.',id,deleted_at,NULL',
            ],
        ];
    }
}
