<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyNotumRequest;
use App\Http\Requests\StoreNotumRequest;
use App\Http\Requests\UpdateNotumRequest;
use App\Notum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotaController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('notum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nota = Notum::all();

        return view('admin.nota.index', compact('nota'));
    }

    public function create()
    {
        abort_if(Gate::denies('notum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nota.create');
    }

    public function store(StoreNotumRequest $request)
    {
        $notum = Notum::create($request->all());

        foreach ($request->input('anexos', []) as $file) {
            $notum->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('anexos');
        }

        return redirect()->route('admin.nota.index');
    }

    public function edit(Notum $notum)
    {
        abort_if(Gate::denies('notum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nota.edit', compact('notum'));
    }

    public function update(UpdateNotumRequest $request, Notum $notum)
    {
        $notum->update($request->all());

        if (count($notum->anexos) > 0) {
            foreach ($notum->anexos as $media) {
                if (!in_array($media->file_name, $request->input('anexos', []))) {
                    $media->delete();
                }
            }
        }

        $media = $notum->anexos->pluck('file_name')->toArray();

        foreach ($request->input('anexos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $notum->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('anexos');
            }
        }

        return redirect()->route('admin.nota.index');
    }

    public function show(Notum $notum)
    {
        abort_if(Gate::denies('notum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nota.show', compact('notum'));
    }

    public function destroy(Notum $notum)
    {
        abort_if(Gate::denies('notum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notum->delete();

        return back();
    }

    public function massDestroy(MassDestroyNotumRequest $request)
    {
        Notum::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
