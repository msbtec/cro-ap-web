<?php

namespace App\Http\Requests;

use App\CategoriaProfissional;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCategoriaProfissionalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('categoria_profissional_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:categoria_profissionals,id',
        ];
    }
}
