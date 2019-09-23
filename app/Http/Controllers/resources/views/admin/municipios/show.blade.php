@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.municipio.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.municipio.fields.id') }}
                        </th>
                        <td>
                            {{ $municipio->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.municipio.fields.nome') }}
                        </th>
                        <td>
                            {{ $municipio->nome }}
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