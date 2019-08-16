@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.evento.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.evento.fields.id') }}
                        </th>
                        <td>
                            {{ $evento->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.evento.fields.titulo') }}
                        </th>
                        <td>
                            {{ $evento->titulo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.evento.fields.data') }}
                        </th>
                        <td>
                            {{ $evento->data }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.evento.fields.informacoes') }}
                        </th>
                        <td>
                            {!! $evento->informacoes !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.evento.fields.imagens') }}
                        </th>
                        <td>
                            @foreach($evento->imagens as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>
@endsection