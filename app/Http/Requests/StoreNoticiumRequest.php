<?php

namespace App\Http\Requests;

use App\Noticium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreNoticiumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('noticium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'titulo'        => [
                'min:5',
                'max:400',
                'required',
            ],
            'resumo'        => [
                'min:0',
                'max:500',
                'required',
            ],
            'dt_publicacao' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'texto'         => [
                'required',
            ],
        ];
    }
}
