<?php

namespace App\Http\Requests;

use App\Denuncium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateDenunciumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('denuncium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
        ];
    }
}
