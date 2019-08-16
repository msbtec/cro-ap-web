<?php

namespace App\Http\Controllers\Admin;

use App\CategoriaProfissional;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCategoriaProfissionalRequest;
use App\Http\Requests\StoreCategoriaProfissionalRequest;
use App\Http\Requests\UpdateCategoriaProfissionalRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoriaProfissionalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('categoria_profissional_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoriaProfissionals = CategoriaProfissional::all();

        return view('admin.categoriaProfissionals.index', compact('categoriaProfissionals'));
    }

    public function create()
    {
        abort_if(Gate::denies('categoria_profissional_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categoriaProfissionals.create');
    }

    public function store(StoreCategoriaProfissionalRequest $request)
    {
        $categoriaProfissional = CategoriaProfissional::create($request->all());

        return redirect()->route('admin.categoria-profissionals.index');
    }

    public function edit(CategoriaProfissional $categoriaProfissional)
    {
        abort_if(Gate::denies('categoria_profissional_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categoriaProfissionals.edit', compact('categoriaProfissional'));
    }

    public function update(UpdateCategoriaProfissionalRequest $request, CategoriaProfissional $categoriaProfissional)
    {
        $categoriaProfissional->update($request->all());

        return redirect()->route('admin.categoria-profissionals.index');
    }

    public function show(CategoriaProfissional $categoriaProfissional)
    {
        abort_if(Gate::denies('categoria_profissional_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categoriaProfissionals.show', compact('categoriaProfissional'));
    }

    public function destroy(CategoriaProfissional $categoriaProfissional)
    {
        abort_if(Gate::denies('categoria_profissional_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoriaProfissional->delete();

        return back();
    }

    public function massDestroy(MassDestroyCategoriaProfissionalRequest $request)
    {
        CategoriaProfissional::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
