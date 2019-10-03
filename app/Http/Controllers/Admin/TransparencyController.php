<?php

namespace App\Http\Controllers\Admin;

use App\FileTransparency;
use App\Transparency;
use App\TypeTransparency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class TransparencyController extends Controller
{

    public function index()
    {
        $transparency = Transparency::Orderby('id')->get();
        return view('admin.transparency.index',compact('transparency'));
    }

    public function create()
    {
        $typetransparency = TypeTransparency::all()->pluck('name','id');
        return view('admin.transparency.create',compact('typetransparency'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'type_id'  => 'required',
        ],
            $messages = [
                'name.required'     => 'Campo obrigatório',
                'type_id.required'  => 'Campo obrigatório',
            ]);

        $data = $request->all();

        Transparency::create($data);
        return redirect()->route('admin.transparency.index');
    }


    public function show(Transparency $transparency)
    {
        $fileTransparency = FileTransparency::where('transparency_id',$transparency->id)->get();
        return view('admin.transparency.show',compact('transparency','fileTransparency'));
    }

    public function edit(Transparency $transparency)
    {
        $typetransparency = TypeTransparency::all()->pluck('name','id');
        return view('admin.transparency.edit',compact('transparency','typetransparency'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'     => 'required',
            'type_id'  => 'required',
        ],
            $messages = [
                'name.required'     => 'Campo obrigatório',
                'type_id.required'  => 'Campo obrigatório',
            ]);


        $data = $request->all();

        Transparency::find($id)->update($data);
        return redirect()->route('admin.transparency.index');
    }


    public function destroy(Transparency $transparency)
    {
        $transparency->delete();
        return back();
    }

    public function upload()
    {

    }
}
