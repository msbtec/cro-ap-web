<?php

namespace App\Http\Controllers\Admin;

use App\TypeTransparency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class TypeTransparencyController extends Controller
{
    public function index()
    {
        $typeTransparency = TypeTransparency::OrderBy('name')->get();
        return view('admin.typetransparency.index',compact('typeTransparency'));
    }


    public function create()
    {
        return view('admin.typetransparency.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|unique:type_transparencies',
        ],
            $messages = [
                'name.unique'   => 'Tipo já existe',
            ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        TypeTransparency::create($data);
        return redirect()->route('admin.typetransparency.index');
    }


    public function show($id)
    {
        //
    }


    public function edit(TypeTransparency $typetransparency)
    {
        return view('admin.typetransparency.edit',compact('typetransparency'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'   => 'required|unique:type_transparencies,name,'.$id,
        ],
            $messages = [
                'name.unique'   => 'Tipo já existe',
            ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        TypeTransparency::find($id)->update($data);


        return redirect()->route('admin.typetransparency.index');
    }


    public function destroy(TypeTransparency $typetransparency)
    {
        $typetransparency->delete();
        return back();
    }
}
