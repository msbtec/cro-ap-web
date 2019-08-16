<?php

namespace App\Http\Requests;

use App\Municipio;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreMunicipioRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('municipio_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nome' => [
                'min:1',
                'max:50',
                'required',
            ],
        ];
    }
}
