<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CategoriaProfissional;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoriaProfissionalRequest;
use App\Http\Requests\UpdateCategoriaProfissionalRequest;
use App\Http\Resources\Admin\CategoriaProfissionalResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoriaProfissionalApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('categoria_profissional_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CategoriaProfissionalResource(CategoriaProfissional::all());
    }

    public function store(StoreCategoriaProfissionalRequest $request)
    {
        $categoriaProfissional = CategoriaProfissional::create($request->all());

        return (new CategoriaProfissionalResource($categoriaProfissional))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CategoriaProfissional $categoriaProfissional)
    {
        abort_if(Gate::denies('categoria_profissional_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CategoriaProfissionalResource($categoriaProfissional);
    }

    public function update(UpdateCategoriaProfissionalRequest $request, CategoriaProfissional $categoriaProfissional)
    {
        $categoriaProfissional->update($request->all());

        return (new CategoriaProfissionalResource($categoriaProfissional))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CategoriaProfissional $categoriaProfissional)
    {
        abort_if(Gate::denies('categoria_profissional_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoriaProfissional->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
