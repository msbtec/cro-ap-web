<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreParceiroRequest;
use App\Http\Requests\UpdateParceiroRequest;
use App\Http\Resources\Admin\ParceiroResource;
use App\Parceiro;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ParceiroApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('parceiro_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ParceiroResource(Parceiro::with(['categoria'])->get());
    }

    public function store(StoreParceiroRequest $request)
    {
        $parceiro = Parceiro::create($request->all());
        $parceiro->categoria()->sync($request->input('categoria', []));

        return (new ParceiroResource($parceiro))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Parceiro $parceiro)
    {
        abort_if(Gate::denies('parceiro_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ParceiroResource($parceiro->load(['categoria']));
    }

    public function update(UpdateParceiroRequest $request, Parceiro $parceiro)
    {
        $parceiro->update($request->all());
        $parceiro->categoria()->sync($request->input('categoria', []));

        return (new ParceiroResource($parceiro))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Parceiro $parceiro)
    {
        abort_if(Gate::denies('parceiro_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parceiro->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
