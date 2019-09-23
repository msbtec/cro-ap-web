@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.denuncium.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.denuncium.fields.id') }}
                        </th>
                        <td>
                            {{ $denuncium->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.denuncium.fields.nome') }}
                        </th>
                        <td>
                            {{ $denuncium->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.denuncium.fields.telefone') }}
                        </th>
                        <td>
                            {{ $denuncium->telefone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.denuncium.fields.email') }}
                        </th>
                        <td>
                            {{ $denuncium->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.denuncium.fields.texto') }}
                        </th>
                        <td>
                            {{ $denuncium->texto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.denuncium.fields.status') }}
                        </th>
                        <td>
                            {{ App\Denuncium::STATUS_SELECT[$denuncium->status] }}
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