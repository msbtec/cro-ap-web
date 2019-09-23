<?php

namespace App\Http\Requests;

use App\Denuncium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreDenunciumRequest extends FormRequest
{
    public function authorize()
    {
        //abort_if(Gate::denies('denuncium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
        ];
    }
}
