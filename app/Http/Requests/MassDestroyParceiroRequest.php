<?php

namespace App\Http\Requests;

use App\Parceiro;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyParceiroRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('parceiro_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:parceiros,id',
        ];
    }
}
