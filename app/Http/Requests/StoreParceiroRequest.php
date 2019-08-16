<?php

namespace App\Http\Requests;

use App\Parceiro;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreParceiroRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('parceiro_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nome'     => [
                'min:0',
                'max:50',
                'required',
            ],
            'detalhes' => [
                'required',
            ],
            'endereco' => [
                'min:0',
                'max:250',
                'required',
            ],
        ];
    }
}
