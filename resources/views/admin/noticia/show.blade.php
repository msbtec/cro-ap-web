@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.noticium.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.noticium.fields.id') }}
                        </th>
                        <td>
                            {{ $noticium->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.noticium.fields.titulo') }}
                        </th>
                        <td>
                            {{ $noticium->titulo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.noticium.fields.resumo') }}
                        </th>
                        <td>
                            {{ $noticium->resumo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.noticium.fields.dt_publicacao') }}
                        </th>
                        <td>
                            {{ $noticium->dt_publicacao }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.noticium.fields.foto_capa') }}
                        </th>
                        <td>
                            @if($noticium->foto_capa)
                                <a href="{{ $noticium->foto_capa->getUrl() }}" target="_blank">
                                    <img src="{{ $noticium->foto_capa->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.noticium.fields.texto') }}
                        </th>
                        <td>
                            {!! $noticium->texto !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.noticium.fields.fotos') }}
                        </th>
                        <td>
                            @foreach($noticium->fotos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.noticium.fields.ativo') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled {{ $noticium->ativo ? "checked" : "" }}>
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