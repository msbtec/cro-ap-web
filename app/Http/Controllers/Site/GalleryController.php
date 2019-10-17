<?php

namespace App\Http\Controllers\Site;

use App\Album;
use App\Gallery;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{

    public function index()
    {
        $albums = Album::orderBy('date','DESC')->paginate(9);
        return view('site.galeria.index',compact('albums'));
    }
    public function show($slug)
    {
        $album = Album::whereSlug($slug)->first();
        $galeria = Gallery::where('album_id',$album->id)->get();
        return view('site.galeria.show',compact('album','galeria'));
    }



}
