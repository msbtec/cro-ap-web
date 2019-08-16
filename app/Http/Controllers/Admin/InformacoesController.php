<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyInformacoRequest;
use App\Http\Requests\StoreInformacoRequest;
use App\Http\Requests\UpdateInformacoRequest;
use App\Informaco;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InformacoesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('informaco_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $informacos = Informaco::all();

        return view('admin.informacos.index', compact('informacos'));
    }

    public function create()
    {
        abort_if(Gate::denies('informaco_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.informacos.create');
    }

    public function store(StoreInformacoRequest $request)
    {
        $informaco = Informaco::create($request->all());

        foreach ($request->input('fotos', []) as $file) {
            $informaco->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('fotos');
        }

        return redirect()->route('admin.informacos.index');
    }

    public function edit(Informaco $informaco)
    {
        abort_if(Gate::denies('informaco_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.informacos.edit', compact('informaco'));
    }

    public function update(UpdateInformacoRequest $request, Informaco $informaco)
    {
        $informaco->update($request->all());

        if (count($informaco->fotos) > 0) {
            foreach ($informaco->fotos as $media) {
                if (!in_array($media->file_name, $request->input('fotos', []))) {
                    $media->delete();
                }
            }
        }

        $media = $informaco->fotos->pluck('file_name')->toArray();

        foreach ($request->input('fotos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $informaco->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('fotos');
            }
        }

        return redirect()->route('admin.informacos.index');
    }

    public function show(Informaco $informaco)
    {
        abort_if(Gate::denies('informaco_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.informacos.show', compact('informaco'));
    }

    public function destroy(Informaco $informaco)
    {
        abort_if(Gate::denies('informaco_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $informaco->delete();

        return back();
    }

    public function massDestroy(MassDestroyInformacoRequest $request)
    {
        Informaco::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
