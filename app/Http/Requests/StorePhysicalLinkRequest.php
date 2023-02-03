<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePhysicalLinkRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('physical_link_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'src_id' => [
                'required',
            ],
            'dest_id' => [
                'required',
            ],
        ];
    }
}
