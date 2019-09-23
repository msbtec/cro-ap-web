@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.informaco.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.informaco.fields.id') }}
                        </th>
                        <td>
                            {{ $informaco->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.informaco.fields.pagina') }}
                        </th>
                        <td>
                            {{ $informaco->pagina }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.informaco.fields.texto') }}
                        </th>
                        <td>
                            {!! $informaco->texto !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.informaco.fields.fotos') }}
                        </th>
                        <td>
                            @foreach($informaco->fotos as $key => $media)
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