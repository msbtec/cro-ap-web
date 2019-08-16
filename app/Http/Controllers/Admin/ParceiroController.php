<?php

namespace App\Http\Controllers\Admin;

use App\Categorium;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyParceiroRequest;
use App\Http\Requests\StoreParceiroRequest;
use App\Http\Requests\UpdateParceiroRequest;
use App\Parceiro;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ParceiroController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('parceiro_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parceiros = Parceiro::all();

        return view('admin.parceiros.index', compact('parceiros'));
    }

    public function create()
    {
        abort_if(Gate::denies('parceiro_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categorias = Categorium::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.parceiros.create', compact('categorias'));
    }

    public function store(StoreParceiroRequest $request)
    {
        $parceiro = Parceiro::create($request->all());

        return redirect()->route('admin.parceiros.index');
    }

    public function edit(Parceiro $parceiro)
    {
        abort_if(Gate::denies('parceiro_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categorias = Categorium::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $parceiro->load('categoria');

        return view('admin.parceiros.edit', compact('categorias', 'parceiro'));
    }

    public function update(UpdateParceiroRequest $request, Parceiro $parceiro)
    {
        $parceiro->update($request->all());

        return redirect()->route('admin.parceiros.index');
    }

    public function show(Parceiro $parceiro)
    {
        abort_if(Gate::denies('parceiro_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parceiro->load('categoria');

        return view('admin.parceiros.show', compact('parceiro'));
    }

    public function destroy(Parceiro $parceiro)
    {
        abort_if(Gate::denies('parceiro_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parceiro->delete();

        return back();
    }

    public function massDestroy(MassDestroyParceiroRequest $request)
    {
        Parceiro::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
