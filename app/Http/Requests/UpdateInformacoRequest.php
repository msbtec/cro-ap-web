<?php

namespace App\Http\Requests;

use App\Informaco;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateInformacoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('informaco_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'pagina' => [
                'min:0',
                'max:15',
                'required',
            ],
            'texto'  => [
                'required',
            ],
        ];
    }
}
