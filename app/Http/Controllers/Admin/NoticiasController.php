<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyNoticiumRequest;
use App\Http\Requests\StoreNoticiumRequest;
use App\Http\Requests\UpdateNoticiumRequest;
use App\Noticium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NoticiasController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('noticium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $noticia = Noticium::all();

        return view('admin.noticia.index', compact('noticia'));
    }

    public function create()
    {
        abort_if(Gate::denies('noticium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.noticia.create');
    }

    public function store(StoreNoticiumRequest $request)
    {
        $noticium = Noticium::create($request->all());

        if ($request->input('foto_capa', false)) {
            $noticium->addMedia(storage_path('tmp/uploads/' . $request->input('foto_capa')))->toMediaCollection('foto_capa');
        }

        foreach ($request->input('fotos', []) as $file) {
            $noticium->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('fotos');
        }

        return redirect()->route('admin.noticia.index');
    }

    public function edit(Noticium $noticium)
    {
        abort_if(Gate::denies('noticium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.noticia.edit', compact('noticium'));
    }

    public function update(UpdateNoticiumRequest $request, Noticium $noticium)
    {
        $noticium->update($request->all());

        if ($request->input('foto_capa', false)) {
            if (!$noticium->foto_capa || $request->input('foto_capa') !== $noticium->foto_capa->file_name) {
                $noticium->addMedia(storage_path('tmp/uploads/' . $request->input('foto_capa')))->toMediaCollection('foto_capa');
            }
        } elseif ($noticium->foto_capa) {
            $noticium->foto_capa->delete();
        }

        if (count($noticium->fotos) > 0) {
            foreach ($noticium->fotos as $media) {
                if (!in_array($media->file_name, $request->input('fotos', []))) {
                    $media->delete();
                }
            }
        }

        $media = $noticium->fotos->pluck('file_name')->toArray();

        foreach ($request->input('fotos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $noticium->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('fotos');
            }
        }

        return redirect()->route('admin.noticia.index');
    }

    public function show(Noticium $noticium)
    {
        abort_if(Gate::denies('noticium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.noticia.show', compact('noticium'));
    }

    public function destroy(Noticium $noticium)
    {
        abort_if(Gate::denies('noticium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $noticium->delete();

        return back();
    }

    public function massDestroy(MassDestroyNoticiumRequest $request)
    {
        Noticium::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
