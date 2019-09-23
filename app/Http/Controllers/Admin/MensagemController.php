<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMensagemRequest;
use App\Http\Requests\StoreMensagemRequest;
use App\Http\Requests\UpdateMensagemRequest;
use App\Mensagem;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MensagemController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mensagem_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mensagems = Mensagem::all();

        return view('admin.mensagems.index', compact('mensagems'));
    }

    public function create()
    {
        abort_if(Gate::denies('mensagem_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mensagems.create');
    }

    public function store(StoreMensagemRequest $request)
    {
        $mensagem = Mensagem::create($request->all());

        return redirect()->route('admin.mensagems.index');
    }

    public function edit(Mensagem $mensagem)
    {
        abort_if(Gate::denies('mensagem_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mensagems.edit', compact('mensagem'));
    }

    public function update(UpdateMensagemRequest $request, Mensagem $mensagem)
    {
        $mensagem->update($request->all());

        return redirect()->route('admin.mensagems.index');
    }

    public function show(Mensagem $mensagem)
    {
        abort_if(Gate::denies('mensagem_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mensagems.show', compact('mensagem'));
    }

    public function destroy(Mensagem $mensagem)
    {
        abort_if(Gate::denies('mensagem_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mensagem->delete();

        return back();
    }

    public function massDestroy(MassDestroyMensagemRequest $request)
    {
        Mensagem::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
