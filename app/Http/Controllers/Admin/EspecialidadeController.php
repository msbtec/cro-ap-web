<?php

namespace App\Http\Controllers\Admin;

use App\Especialidade;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEspecialidadeRequest;
use App\Http\Requests\StoreEspecialidadeRequest;
use App\Http\Requests\UpdateEspecialidadeRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EspecialidadeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('especialidade_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $especialidades = Especialidade::all();

        return view('admin.especialidades.index', compact('especialidades'));
    }

    public function create()
    {
        abort_if(Gate::denies('especialidade_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.especialidades.create');
    }

    public function store(StoreEspecialidadeRequest $request)
    {
        $especialidade = Especialidade::create($request->all());

        return redirect()->route('admin.especialidades.index');
    }

    public function edit(Especialidade $especialidade)
    {
        abort_if(Gate::denies('especialidade_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.especialidades.edit', compact('especialidade'));
    }

    public function update(UpdateEspecialidadeRequest $request, Especialidade $especialidade)
    {
        $especialidade->update($request->all());

        return redirect()->route('admin.especialidades.index');
    }

    public function show(Especialidade $especialidade)
    {
        abort_if(Gate::denies('especialidade_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.especialidades.show', compact('especialidade'));
    }

    public function destroy(Especialidade $especialidade)
    {
        abort_if(Gate::denies('especialidade_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $especialidade->delete();

        return back();
    }

    public function massDestroy(MassDestroyEspecialidadeRequest $request)
    {
        Especialidade::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
