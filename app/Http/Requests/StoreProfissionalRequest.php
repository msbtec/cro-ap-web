<?php

namespace App\Http\Requests;

use App\Profissional;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreProfissionalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('profissional_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nome'             => [
                'min:0',
                'max:255',
                'required',
            ],
            'cro'              => [
                'min:0',
                'max:10',
                'required',
            ],
            'categoria_id'     => [
                'required',
                'integer',
            ],
            'cpf'              => [
                'required',
            ],
            'data_nascimento'  => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'fone_1'           => [
                'min:0',
                'max:20',
            ],
            'fone_2'           => [
                'min:0',
                'max:15',
                'required',
            ],
            'fone_3'           => [
                'min:0',
                'max:15',
            ],
            'cep'              => [
                'min:0',
                'max:10',
            ],
            'logradouro'       => [
                'min:0',
                'max:255',
            ],
            'numero'           => [
                'min:0',
                'max:10',
            ],
            'complemento'      => [
                'min:0',
                'max:255',
            ],
            'bairro'           => [
                'min:0',
                'max:255',
            ],
            'especialidades.*' => [
                'integer',
            ],
            'especialidades'   => [
                'array',
            ],
            'habilitacoes.*'   => [
                'integer',
            ],
            'habilitacoes'     => [
                'array',
            ],
        ];
    }
}
