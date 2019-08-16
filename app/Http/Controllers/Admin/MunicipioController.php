<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMunicipioRequest;
use App\Http\Requests\StoreMunicipioRequest;
use App\Http\Requests\UpdateMunicipioRequest;
use App\Municipio;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MunicipioController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('municipio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $municipios = Municipio::all();

        return view('admin.municipios.index', compact('municipios'));
    }

    public function create()
    {
        abort_if(Gate::denies('municipio_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.municipios.create');
    }

    public function store(StoreMunicipioRequest $request)
    {
        $municipio = Municipio::create($request->all());

        return redirect()->route('admin.municipios.index');
    }

    public function edit(Municipio $municipio)
    {
        abort_if(Gate::denies('municipio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.municipios.edit', compact('municipio'));
    }

    public function update(UpdateMunicipioRequest $request, Municipio $municipio)
    {
        $municipio->update($request->all());

        return redirect()->route('admin.municipios.index');
    }

    public function show(Municipio $municipio)
    {
        abort_if(Gate::denies('municipio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.municipios.show', compact('municipio'));
    }

    public function destroy(Municipio $municipio)
    {
        abort_if(Gate::denies('municipio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $municipio->delete();

        return back();
    }

    public function massDestroy(MassDestroyMunicipioRequest $request)
    {
        Municipio::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
