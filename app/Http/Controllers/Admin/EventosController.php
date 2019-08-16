<?php

namespace App\Http\Controllers\Admin;

use App\Evento;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyEventoRequest;
use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventosController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('evento_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventos = Evento::all();

        return view('admin.eventos.index', compact('eventos'));
    }

    public function create()
    {
        abort_if(Gate::denies('evento_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.eventos.create');
    }

    public function store(StoreEventoRequest $request)
    {
        $evento = Evento::create($request->all());

        foreach ($request->input('imagens', []) as $file) {
            $evento->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('imagens');
        }

        return redirect()->route('admin.eventos.index');
    }

    public function edit(Evento $evento)
    {
        abort_if(Gate::denies('evento_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.eventos.edit', compact('evento'));
    }

    public function update(UpdateEventoRequest $request, Evento $evento)
    {
        $evento->update($request->all());

        if (count($evento->imagens) > 0) {
            foreach ($evento->imagens as $media) {
                if (!in_array($media->file_name, $request->input('imagens', []))) {
                    $media->delete();
                }
            }
        }

        $media = $evento->imagens->pluck('file_name')->toArray();

        foreach ($request->input('imagens', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $evento->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('imagens');
            }
        }

        return redirect()->route('admin.eventos.index');
    }

    public function show(Evento $evento)
    {
        abort_if(Gate::denies('evento_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.eventos.show', compact('evento'));
    }

    public function destroy(Evento $evento)
    {
        abort_if(Gate::denies('evento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $evento->delete();

        return back();
    }

    public function massDestroy(MassDestroyEventoRequest $request)
    {
        Evento::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
