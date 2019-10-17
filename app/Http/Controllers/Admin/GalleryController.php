<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class GalleryController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'legend'       => 'required',
            'image'        => 'required|max:2048|image',

        ], $message = [
            'legend.required'     => 'Campo obrigatório',
            'image.required'      => 'Imagem obrigatória',
        ]);

        $folder = $request->folder;
        $file = $request->file('image')->store('albums/'.$folder);

        $data = $request->all();
        $data['image'] = $file;

        Gallery::create($data);
        return redirect()->back();
    }

    public function destroy(Gallery $gallery)
    {
        Storage::delete($gallery->image);
        $gallery->delete();
        return redirect()->back();
    }
}
