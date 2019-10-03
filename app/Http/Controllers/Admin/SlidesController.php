<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNoticiumRequest;
use App\Http\Requests\StoreNoticiumRequest;
use App\Http\Requests\UpdateNoticiumRequest;
use App\Noticium;
use App\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class SlidesController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        return view('admin.slide.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.slide.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required',
            'image'      => 'required|max:2048|image',

        ], $message = [
            'title.required'    => 'Campo obrigatório',
            'image.required'    => 'Campo obrigatória',
        ]);

        $file = $request->file('image')->store('slides');
        $data = $request->all();
        $data['image'] = $file;
        Slide::create($data);

        return redirect()->route('admin.slide.index');
    }

    public function edit(Slide $slide)
    {
        return view('admin.slide.edit', compact('slide'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'     => 'required',
            'image'     => 'max:2048|image',

        ], $message = [
            'title.required'    => 'Campo obrigatório',
        ]);

        if($request->file('image')) {

            $arquivo = Slide::find($id)->first()->image;
            Storage::delete($arquivo);

            $file = $request->file('image')->store('slides');

            $data = $request->all();
            $data['image'] = $file;

        }else{
            $data = $request->except('image');
        }

        Slide::find($id)->update($data);

        return redirect()->route('admin.slide.index');
    }


    public function destroy(Slide $slide)
    {
        $slide->delete();
        return back();
    }
}
