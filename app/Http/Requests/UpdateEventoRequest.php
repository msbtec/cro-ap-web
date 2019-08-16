<?php

namespace App\Http\Requests;

use App\Evento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateEventoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('evento_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'titulo' => [
                'min:1',
                'max:40',
                'required',
            ],
            'data'   => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
