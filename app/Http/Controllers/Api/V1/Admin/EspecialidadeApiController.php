<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Especialidade;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEspecialidadeRequest;
use App\Http\Requests\UpdateEspecialidadeRequest;
use App\Http\Resources\Admin\EspecialidadeResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EspecialidadeApiController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('especialidade_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EspecialidadeResource(Especialidade::all());
    }

    public function store(StoreEspecialidadeRequest $request)
    {
        $especialidade = Especialidade::create($request->all());

        return (new EspecialidadeResource($especialidade))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Especialidade $especialidade)
    {
        //abort_if(Gate::denies('especialidade_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EspecialidadeResource($especialidade);
    }

    public function update(UpdateEspecialidadeRequest $request, Especialidade $especialidade)
    {
        $especialidade->update($request->all());

        return (new EspecialidadeResource($especialidade))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Especialidade $especialidade)
    {
        abort_if(Gate::denies('especialidade_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $especialidade->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
