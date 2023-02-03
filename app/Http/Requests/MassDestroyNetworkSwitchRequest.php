<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNetworkSwitchRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('network_switch_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids' => 'required|array',
            'ids.*' => 'exists:network_switches,id',
        ];
    }
}
