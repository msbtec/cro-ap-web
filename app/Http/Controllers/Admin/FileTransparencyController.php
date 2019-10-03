<?php

namespace App\Http\Controllers\Admin;

use App\FileTransparency;
use App\Transparency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FileTransparencyController extends Controller
{
    public function index()
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'file'     => 'required',

        ], $message = [
            'name.required'    => 'Nome obrigatório',
            'file.required'    => 'Arquivo obrigatório',
        ]);

        $file = $request->file('file')->store('transparencies');
        $data = $request->all();
        $data['file'] = $file;
        FileTransparency::create($data);

        return redirect()->route('admin.transparency.show',$request->transparency_id);
    }

    public function edit($id)
    {
        $transparency = Transparency::where('id',$id)->first();
        $fileTransparency = FileTransparency::where('id',$id)->first();
        return view('admin.transparency.editFile', compact('fileTransparency','transparency'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'     => 'required',

        ], $message = [
            'name.required'    => 'Campo obrigatório',
        ]);

        if($request->file('file')) {

            $arquivo = FileTransparency::find($id)->first()->file;
            Storage::delete($arquivo);

            $file = $request->file('file')->store('transparencies');

            $data = $request->all();
            $data['file'] = $file;

        }else{
            $data = $request->except('file');
        }

        FileTransparency::find($id)->update($data);

        return redirect()->route('admin.transparency.show',$request->transparency_id);
    }


    public function destroy($id)
    {
        $fileTransparency = FileTransparency::findOrFail($id);
        Storage::delete($fileTransparency->file);
        $fileTransparency->delete();
        return back();
    }
}
