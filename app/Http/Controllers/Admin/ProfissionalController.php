<?php

namespace App\Http\Controllers\Admin;

use App\CategoriaProfissional;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProfissionalRequest;
use App\Http\Requests\StoreProfissionalRequest;
use App\Http\Requests\UpdateProfissionalRequest;
use App\Profissional;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProfissionalController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('profissional_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profissionals = Profissional::all();

        return view('admin.profissionals.index', compact('profissionals'));
    }

    public function create()
    {
        abort_if(Gate::denies('profissional_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categorias = CategoriaProfissional::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.profissionals.create', compact('categorias'));
    }

    public function store(StoreProfissionalRequest $request)
    {
        $profissional = Profissional::create($request->all());

        if ($request->input('foto', false)) {
            $profissional->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
        }

        return redirect()->route('admin.profissionals.index');
    }

    public function edit(Profissional $profissional)
    {
        abort_if(Gate::denies('profissional_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categorias = CategoriaProfissional::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $profissional->load('categoria');

        return view('admin.profissionals.edit', compact('categorias', 'profissional'));
    }

    public function update(UpdateProfissionalRequest $request, Profissional $profissional)
    {
        $profissional->update($request->all());

        if ($request->input('foto', false)) {
            if (!$profissional->foto || $request->input('foto') !== $profissional->foto->file_name) {
                $profissional->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
            }
        } elseif ($profissional->foto) {
            $profissional->foto->delete();
        }

        return redirect()->route('admin.profissionals.index');
    }

    public function show(Profissional $profissional)
    {
        abort_if(Gate::denies('profissional_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profissional->load('categoria');

        return view('admin.profissionals.show', compact('profissional'));
    }

    public function destroy(Profissional $profissional)
    {
        abort_if(Gate::denies('profissional_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profissional->delete();

        return back();
    }

    public function massDestroy(MassDestroyProfissionalRequest $request)
    {
        Profissional::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
