<?php

namespace App\Http\Controllers\Site;

use App\Noticium;
use App\Schedule;
use App\Slide;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $sliders = Slide::OrderBy('id','DESC')->get();
        $schedules = Schedule::where('data','>=',Carbon::today())->OrderBy('data')->limit(5)->get();
        $noticias = Noticium::orderBy('id')->limit(4)->get();
        return view('site.home.index',compact('sliders','schedules','noticias'));
    }

    public function noticia($slug)
    {
        $noticia = Noticium::whereSlug($slug)->first();
        return view('site.noticia.index',compact('noticia'));
    }

    public function send()
    {

    }
}
