<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreNotumRequest;
use App\Http\Requests\UpdateNotumRequest;
use App\Http\Resources\Admin\NotumResource;
use App\Notum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotaApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('notum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NotumResource(Notum::all());
    }

    public function store(StoreNotumRequest $request)
    {
        $notum = Notum::create($request->all());

        if ($request->input('anexos', false)) {
            $notum->addMedia(storage_path('tmp/uploads/' . $request->input('anexos')))->toMediaCollection('anexos');
        }

        return (new NotumResource($notum))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Notum $notum)
    {
        abort_if(Gate::denies('notum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NotumResource($notum);
    }

    public function update(UpdateNotumRequest $request, Notum $notum)
    {
        $notum->update($request->all());

        if ($request->input('anexos', false)) {
            if (!$notum->anexos || $request->input('anexos') !== $notum->anexos->file_name) {
                $notum->addMedia(storage_path('tmp/uploads/' . $request->input('anexos')))->toMediaCollection('anexos');
            }
        } elseif ($notum->anexos) {
            $notum->anexos->delete();
        }

        return (new NotumResource($notum))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Notum $notum)
    {
        abort_if(Gate::denies('notum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notum->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
