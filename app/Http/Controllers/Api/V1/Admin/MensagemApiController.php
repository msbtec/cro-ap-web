<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMensagemRequest;
use App\Http\Requests\UpdateMensagemRequest;
use App\Http\Resources\Admin\MensagemResource;
use App\Mensagem;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MensagemApiController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('mensagem_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MensagemResource(Mensagem::all());
    }

    public function store(StoreMensagemRequest $request)
    {
        $mensagem = Mensagem::create($request->all());

        return (new MensagemResource($mensagem))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Mensagem $mensagem)
    {
        abort_if(Gate::denies('mensagem_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MensagemResource($mensagem);
    }

    public function update(UpdateMensagemRequest $request, Mensagem $mensagem)
    {
        $mensagem->update($request->all());

        return (new MensagemResource($mensagem))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Mensagem $mensagem)
    {
        abort_if(Gate::denies('mensagem_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mensagem->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
