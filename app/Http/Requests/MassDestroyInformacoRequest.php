<?php

namespace App\Http\Requests;

use App\Informaco;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyInformacoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('informaco_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:informacos,id',
        ];
    }
}
