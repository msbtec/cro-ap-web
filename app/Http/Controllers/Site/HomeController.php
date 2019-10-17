<?php

namespace App\Http\Controllers\Site;

use App\Album;
use App\Evento;
use App\Media;
use App\Noticium;
use App\Schedule;
use App\Slide;
use App\Transparency;
use App\TypeTransparency;
use App\Video;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function home()
    {
        $sliders = Slide::OrderBy('id','DESC')->get();
        $schedules = Schedule::where('data','>=',Carbon::today())->OrderBy('data')->limit(5)->get();
        $noticias = Noticium::orderBy('id')->limit(4)->get();
        $album = Album::orderBy('id','DESC')->limit(8)->get();
        $video = Video::all()->random(1);

        return view('site.home.index',compact('sliders','schedules','noticias','video','videos','album'));
    }

    public function noticia($slug)
    {
        $noticia = Noticium::whereSlug($slug)->first();
        $midias = Media::where('model_id',$noticia->id)->whereNotIn('collection_name',['foto_capa'])->get();
        return view('site.noticia.index',compact('noticia','midias'));
    }

    public function noticias()
    {
        $noticias = Noticium::paginate(5);
        return view('site.noticia.list',compact('noticias'));
    }

    public function videos()
    {
        $videos = Video::paginate(9);
        return view('site.videos.list',compact('videos'));
    }

    public function contact(Request $request)
    {
        $request->validate([
            'namec'         => 'required',
            'subjectc'      => 'required',
            'emailc'        => 'required',
            'messagemc'      => 'required',
            'g-recaptcha-response' => 'required|captcha',

        ], $message = [
            'namec.required'        => 'Você precisa informa seu nome completo',
            'subjectc.required'     => 'Você precisa informa o assunto',
            'emailc.required'       => 'Você precisa informar seu e-mail',
            'messagemc.required'     => 'Digite a mensagem',
            'g-recaptcha-response.required'  => 'Marque o reCAPTCHA',

        ]);

        $data['namec'] = $request->namec;
        $data['subjectc'] = $request->subjectc;
        $data['emailc'] = $request->emailc;
        $data['messagemc'] = $request->messagemc;

        Mail::send('site.contato.email', $data, function($message) {
            $message->to('renanmiranda@hotmail.com.br', 'Contato via CRO Website')->subject('Contato via CRO Website');
        });

        if (Mail::failures()) {
            alert()->error('Erro', 'Houve algum problema no envio, tente novamente mais tarde');
            return back();
        }else{
            alert()->success('Sucesso', 'E-mail enviado com sucesso');
            return back();
        }

    }
}
