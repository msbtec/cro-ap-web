<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreProfissionalRequest;
use App\Http\Requests\UpdateProfissionalRequest;
use App\Http\Resources\Admin\ProfissionalResource;
use App\Profissional;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProfissionalApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('profissional_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProfissionalResource(Profissional::with(['categoria'])->get());
    }

    public function store(StoreProfissionalRequest $request)
    {
        $profissional = Profissional::create($request->all());
        $profissional->categoria()->sync($request->input('categoria', []));

        if ($request->input('foto', false)) {
            $profissional->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
        }

        return (new ProfissionalResource($profissional))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Profissional $profissional)
    {
        abort_if(Gate::denies('profissional_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProfissionalResource($profissional->load(['categoria']));
    }

    public function update(UpdateProfissionalRequest $request, Profissional $profissional)
    {
        $profissional->update($request->all());
        $profissional->categoria()->sync($request->input('categoria', []));

        if ($request->input('foto', false)) {
            if (!$profissional->foto || $request->input('foto') !== $profissional->foto->file_name) {
                $profissional->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
            }
        } elseif ($profissional->foto) {
            $profissional->foto->delete();
        }

        return (new ProfissionalResource($profissional))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Profissional $profissional)
    {
        abort_if(Gate::denies('profissional_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profissional->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
