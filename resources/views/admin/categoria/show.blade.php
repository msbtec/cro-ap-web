@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.categorium.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.categorium.fields.id') }}
                        </th>
                        <td>
                            {{ $categorium->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categorium.fields.nome') }}
                        </th>
                        <td>
                            {{ $categorium->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categorium.fields.ativo') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled {{ $categorium->ativo ? "checked" : "" }}>
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