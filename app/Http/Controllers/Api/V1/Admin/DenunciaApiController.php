<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Denuncium;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDenunciumRequest;
use App\Http\Requests\UpdateDenunciumRequest;
use App\Http\Resources\Admin\DenunciumResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DenunciaApiController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('denuncium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DenunciumResource(Denuncium::all());
    }

    public function store(StoreDenunciumRequest $request)
    {        

        $denuncium = Denuncium::create($request->all());

        return (new DenunciumResource($denuncium))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Denuncium $denuncium)
    {
        //abort_if(Gate::denies('denuncium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DenunciumResource($denuncium);
    }

    public function update(UpdateDenunciumRequest $request, Denuncium $denuncium)
    {
        $denuncium->update($request->all());

        return (new DenunciumResource($denuncium))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Denuncium $denuncium)
    {
        //abort_if(Gate::denies('denuncium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $denuncium->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
