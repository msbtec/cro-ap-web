<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Categorium;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoriumRequest;
use App\Http\Requests\UpdateCategoriumRequest;
use App\Http\Resources\Admin\CategoriumResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoriaApiController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('categorium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CategoriumResource(Categorium::all());
    }

    public function store(StoreCategoriumRequest $request)
    {
        $categorium = Categorium::create($request->all());

        return (new CategoriumResource($categorium))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Categorium $categorium)
    {
        //abort_if(Gate::denies('categorium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CategoriumResource($categorium);
    }

    public function update(UpdateCategoriumRequest $request, Categorium $categorium)
    {
        $categorium->update($request->all());

        return (new CategoriumResource($categorium))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Categorium $categorium)
    {
        abort_if(Gate::denies('categorium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categorium->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
