<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInformacoRequest;
use App\Http\Requests\UpdateInformacoRequest;
use App\Http\Resources\Admin\InformacoResource;
use App\Informaco;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InformacoesApiController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('informaco_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InformacoResource(Informaco::all());
    }

    public function store(StoreInformacoRequest $request)
    {
        $informaco = Informaco::create($request->all());

        return (new InformacoResource($informaco))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Informaco $informaco)
    {
        //abort_if(Gate::denies('informaco_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InformacoResource($informaco);
    }

    public function update(UpdateInformacoRequest $request, Informaco $informaco)
    {
        $informaco->update($request->all());

        return (new InformacoResource($informaco))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Informaco $informaco)
    {
        abort_if(Gate::denies('informaco_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $informaco->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
