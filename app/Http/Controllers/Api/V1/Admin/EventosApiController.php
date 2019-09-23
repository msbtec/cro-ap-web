<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Evento;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;
use App\Http\Resources\Admin\EventoResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Carbon;

class EventosApiController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('evento_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventos = Evento::all();

        return $eventos;

    }

    public function index_app()
    {
        //abort_if(Gate::denies('evento_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $eventos = Evento::where('data','>=',Carbon::now())->orderBy('data','DESC')->limit(10)->get();

        return $eventos;

    }

    public function store(StoreEventoRequest $request)
    {
        $evento = Evento::create($request->all());

        return (new EventoResource($evento))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Evento $evento)
    {
        //abort_if(Gate::denies('evento_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EventoResource($evento);
    }

    public function update(UpdateEventoRequest $request, Evento $evento)
    {
        $evento->update($request->all());

        return (new EventoResource($evento))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Evento $evento)
    {
        abort_if(Gate::denies('evento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $evento->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
