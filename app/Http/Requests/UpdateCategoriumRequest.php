<?php

namespace App\Http\Requests;

use App\Categorium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateCategoriumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('categorium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nome' => [
                'min:0',
                'max:50',
                'required',
            ],
        ];
    }
}
