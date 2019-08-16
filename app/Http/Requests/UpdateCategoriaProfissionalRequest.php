<?php

namespace App\Http\Requests;

use App\CategoriaProfissional;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateCategoriaProfissionalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('categoria_profissional_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nome'  => [
                'min:0',
                'max:255',
                'required',
            ],
            'sigla' => [
                'min:0',
                'max:5',
            ],
        ];
    }
}
