<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePhysicalRouterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('physical_router_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'vlans.*' => [
                'integer',
            ],
            'vlans' => [
                'array',
            ],
        ];
    }
}
