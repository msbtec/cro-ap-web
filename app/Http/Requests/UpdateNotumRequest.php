<?php

namespace App\Http\Requests;

use App\Notum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateNotumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('notum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nota'       => [
                'required',
            ],
            'id_usuario' => [
                'digits_between:0,10',
            ],
        ];
    }
}
