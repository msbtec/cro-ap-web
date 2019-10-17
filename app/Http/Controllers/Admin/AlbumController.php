<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Str;
use Yajra\DataTables\DataTables;

class AlbumController extends Controller
{
    public function apiAlbum(){
        $album = Album::orderBy('id','DESC')->get();

        return Datatables::of($album)
            ->editColumn('date', function ($album) {
                return "<div class='text-center'>".date_br($album->date)."</div>";
            })
            ->editColumn('folder', function ($album) {
                return "<div class='text-center'>$album->folder</div>";
            })
            ->addColumn('action', function($album){
                return
                    '<a href="album/'.$album->id.'" class="btn btn-success btn-sm btn-flat"><i class="fas fa-cloud-upload-alt"></i></a> '.
                    '<a href="album/'.$album->id.'/edit" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-edit"></i></a> '.
                    '<a href="javascript:void(0);" onclick="deleteData('. $album->id .')" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash-alt"></i></a>';
            })
            ->rawColumns(['action','date','folder'])
            ->make(true);
    }

    public function index(){
        $albums = Album::orderBy('id','DESC')->get();
        return view('admin.album.index',compact('albums'));
    }


    public function create(){
        return view('admin.album.create');
    }

    public function store(Request $request){

        $request->validate([
            'name'          => 'required',
            'date'          => 'required',
            'local'         => 'required',
            'text'          => 'required',
            'image'         => 'required|max:2048|image',

        ], $message = [
            'name.required'         => 'Campo obrigatório',
            'date.required'         => 'Campo obrigatório',
            'local.required'        => 'Campo obrigatório',
            'text.required'         => 'Campo obrigatório',
            'image.required'        => 'Imagem obrigatória',
        ]);

        $folder = date('dmyhm');
        $file = $request->file('image')->store('albums/'.$folder);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['image'] = $file;
        $data['folder'] = $folder;

        Album::create($data);

        return redirect()->route('admin.album.index');
    }

    public function show(Album $album){
        $gallery = Gallery::where('album_id',$album->id)->get();
        return view('admin.album.show',compact('album','gallery'));
    }


    public function edit(Album $album){
        return view('admin.album.edit',compact('album'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required',
            'date'          => 'required',
            'local'         => 'required',
            'text'          => 'required',
            'image'         => 'max:2048|image',

        ], $message = [
            'name.required'         => 'Campo obrigatório',
            'date.required'         => 'Campo obrigatório',
            'local.required'        => 'Campo obrigatório',
            'text.required'         => 'Campo obrigatório',
        ]);

        if($request->file('image')) {

            $arquivo = Album::find($id)->first()->image;
            $folder = Album::find($id)->first()->folder;

            Storage::delete($arquivo);

            $file = $request->file('image')->store('albums/'.$folder);

            $data = $request->all();
            $data['image'] = $file;

        }else{
            $data = $request->except('image');
        }
        $data['slug'] = Str::slug($request->name);
        Album::FindOrFail($id)->update($data);
        return redirect()->route('admin.album.index');
    }

    public function destroy(Album $album)
    {
        Storage::deleteDirectory('albums/'.$album->folder);
        $album->delete();
        return back();
    }

}
