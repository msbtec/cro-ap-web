<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Habilitacao;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHabilitacaoRequest;
use App\Http\Requests\UpdateHabilitacaoRequest;
use App\Http\Resources\Admin\HabilitacaoResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HabilitacaoApiController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('habilitacao_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HabilitacaoResource(Habilitacao::all());
    }

    public function store(StoreHabilitacaoRequest $request)
    {
        $habilitacao = Habilitacao::create($request->all());

        return (new HabilitacaoResource($habilitacao))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Habilitacao $habilitacao)
    {
        //abort_if(Gate::denies('habilitacao_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HabilitacaoResource($habilitacao);
    }

    public function update(UpdateHabilitacaoRequest $request, Habilitacao $habilitacao)
    {
        $habilitacao->update($request->all());

        return (new HabilitacaoResource($habilitacao))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Habilitacao $habilitacao)
    {
        abort_if(Gate::denies('habilitacao_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $habilitacao->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
