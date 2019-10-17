<?php

namespace App\Http\Controllers\Site;

use App\Album;
use App\Evento;
use App\FileTransparency;
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

class TransparencyController extends Controller
{
    public function index()
    {
        $type = TypeTransparency::orderBy('name')->get();
        return view('site.transparencia.index',compact('type'));
    }

    public function show($name, $slug)
    {
        $type = TypeTransparency::orderBy('name')->get();
        $typeTransparency = TypeTransparency::whereSlug($name)->first();
        $transparency = Transparency::whereSlug($slug)->first();
        $fileTransparency = FileTransparency::where('transparency_id',$transparency->id)->get();

        return view('site.transparencia.show',compact('typeTransparency','transparency','fileTransparency','type'));

    }
}
