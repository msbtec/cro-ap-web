<?php

namespace App\Http\Controllers\Admin;

use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class VideoController extends Controller
{
    public function apiVideo(){
        $videos = Video::orderBy('name','DESC')->get();

        return Datatables::of($videos)
            ->addColumn('action', function($videos){
                return
                    '<a href="video/'.$videos->id.'/edit" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-edit"></i></a> '.
                    '<a href="javascript:void(0);" onclick="deleteData('. $videos->id .')" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash-alt"></i></a>';
            })
            ->rawColumns(['image','action'])
            ->make(true);
    }

    public function index(){
        $videos = Video::orderBy('id','DESC')->get();
        return view('admin.video.index',compact('videos'));
    }


    public function create(){
        return view('admin.video.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'      => 'required',
            'cod'       => 'required|min:11',
            'time'      => 'required',
            'text'      => 'required',

        ], $message = [
            'name.required'     => 'Campo obrigatório',
            'cod.required'      => 'Campo obrigatória',
            'time.required'     => 'Campo obrigatória',
            'text.required'     => 'Campo obrigatória',
        ]);

        $data = $request->all();

        Video::create($data);

        return redirect()->route('admin.video.index');
    }


    public function edit(Video $video){
        return view('admin.video.edit',compact('video'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required',
            'cod'       => 'required|min:11',
            'time'      => 'required',
            'text'      => 'required',

        ], $message = [
            'name.required'     => 'Campo obrigatório',
            'cod.required'      => 'Imagem obrigatória',
            'time.required'     => 'Campo obrigatória',
            'text.required'     => 'Campo obrigatória',
        ]);

        $data = $request->all();
        Video::FindOrFail($id)->update($data);

        return redirect()->route('admin.video.index');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return back();
    }
}
