<?php

namespace App\Http\Requests;

use App\Habilitacao;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateHabilitacaoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('habilitacao_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
