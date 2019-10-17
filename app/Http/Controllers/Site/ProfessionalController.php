<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Profissional;

class ProfessionalController extends Controller
{
    public function index()
    {
        $profissionais = Profissional::all();
        return view('site.profissionais.index',compact('profissionais'));
    }

}
