<?php

namespace App\Http\Controllers\Admin;

use App\Habilitacao;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHabilitacaoRequest;
use App\Http\Requests\StoreHabilitacaoRequest;
use App\Http\Requests\UpdateHabilitacaoRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HabilitacaoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('habilitacao_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $habilitacaos = Habilitacao::all();

        return view('admin.habilitacaos.index', compact('habilitacaos'));
    }

    public function create()
    {
        abort_if(Gate::denies('habilitacao_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.habilitacaos.create');
    }

    public function store(StoreHabilitacaoRequest $request)
    {
        $habilitacao = Habilitacao::create($request->all());

        return redirect()->route('admin.habilitacaos.index');
    }

    public function edit(Habilitacao $habilitacao)
    {
        abort_if(Gate::denies('habilitacao_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.habilitacaos.edit', compact('habilitacao'));
    }

    public function update(UpdateHabilitacaoRequest $request, Habilitacao $habilitacao)
    {
        $habilitacao->update($request->all());

        return redirect()->route('admin.habilitacaos.index');
    }

    public function show(Habilitacao $habilitacao)
    {
        abort_if(Gate::denies('habilitacao_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.habilitacaos.show', compact('habilitacao'));
    }

    public function destroy(Habilitacao $habilitacao)
    {
        abort_if(Gate::denies('habilitacao_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $habilitacao->delete();

        return back();
    }

    public function massDestroy(MassDestroyHabilitacaoRequest $request)
    {
        Habilitacao::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
