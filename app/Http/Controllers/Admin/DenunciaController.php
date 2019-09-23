<?php

namespace App\Http\Controllers\Admin;

use App\Denuncium;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDenunciumRequest;
use App\Http\Requests\StoreDenunciumRequest;
use App\Http\Requests\UpdateDenunciumRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DenunciaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('denuncium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $denuncia = Denuncium::all();

        return view('admin.denuncia.index', compact('denuncia'));
    }

    public function create()
    {
        abort_if(Gate::denies('denuncium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.denuncia.create');
    }

    public function store(StoreDenunciumRequest $request)
    {
        $denuncium = Denuncium::create($request->all());

        return redirect()->route('admin.denuncia.index');
    }

    public function edit(Denuncium $denuncium)
    {
        abort_if(Gate::denies('denuncium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.denuncia.edit', compact('denuncium'));
    }

    public function update(UpdateDenunciumRequest $request, Denuncium $denuncium)
    {
        $denuncium->update($request->all());

        return redirect()->route('admin.denuncia.index');
    }

    public function show(Denuncium $denuncium)
    {
        abort_if(Gate::denies('denuncium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.denuncia.show', compact('denuncium'));
    }

    public function destroy(Denuncium $denuncium)
    {
        abort_if(Gate::denies('denuncium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $denuncium->delete();

        return back();
    }

    public function massDestroy(MassDestroyDenunciumRequest $request)
    {
        Denuncium::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
