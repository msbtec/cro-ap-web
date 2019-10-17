<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Inspection;
use Illuminate\Http\Request;

class FiscalizacaoController extends Controller
{
    public function index()
    {
        return view('site.fiscalizacao.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'phone'     => 'required',
            'email'   => 'required',
            'address'   => 'required',
            'message'   => 'required',
            'g-recaptcha-response' => 'required|captcha',

        ], $message = [
            'name.required'   => 'Você precisa informa seu nome completo',
            'phone.required'   => 'Você precisa informa seu telefone',
            'email.required'    => 'Você precisa informar seu e-mail',
            'address.required'  => 'Você precisa informar seu endereço',
            'message.required'  => 'Digite a mensagem',
            'g-recaptcha-response.required'  => 'Marque o reCAPTCHA',

        ]);

        $data = $request->all();

        Inspection::create($data);

        alert()->success('Sucesso', 'E-mail enviado com sucesso');
        return redirect()->route('site.fiscalizacao');
    }

}
