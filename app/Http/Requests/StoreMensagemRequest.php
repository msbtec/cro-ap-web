<?php

namespace App\Http\Requests;

use App\Mensagem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreMensagemRequest extends FormRequest
{
    public function authorize()
    {
        //abort_if(Gate::denies('mensagem_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
        ];
    }
}
