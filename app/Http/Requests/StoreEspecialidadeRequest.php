<?php

namespace App\Http\Requests;

use App\Especialidade;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreEspecialidadeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('especialidade_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nome' => [
                'min:0',
                'max:255',
            ],
        ];
    }
}
