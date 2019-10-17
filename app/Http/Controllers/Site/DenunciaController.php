<?php

namespace App\Http\Controllers\Site;

use App\Complaint;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DenunciaController extends Controller
{
    public function index()
    {
        return view('site.denuncia.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_1'            => 'required',
            'cro_1'             => 'required',
            'name_2'            => 'required',
            'email_2'           => 'required',
            'telefone_2'        => 'required',
            'local'             => 'required',
            'message'           => 'required',
            'g-recaptcha-response' => 'required|captcha',

        ], $message = [
            'name_1.required'           => 'Nome do denunciado obrigatório',
            'cro_1.required'            => 'CRO do denunciado obrigatório',
            'email_2.required'          => 'Seu e-mail obrigatório',
            'telefone_2.required'       => 'Seu telefone obrigatório',
            'local.required'            => 'Local da denúncia obrigatório',
            'message.required'          => 'Detalhes da denúncia obrigatória',
            'g-recaptcha-response.required'  => 'Marque o reCAPTCHA',

        ]);

        $data = $request->all();

        Complaint::create($data);

        alert()->success('Sucesso', 'Denuncia enviada com sucesso');
        return redirect()->route('site.denuncia');
    }

}
