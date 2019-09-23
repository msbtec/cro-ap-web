@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.especialidade.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.especialidade.fields.id') }}
                        </th>
                        <td>
                            {{ $especialidade->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.especialidade.fields.nome') }}
                        </th>
                        <td>
                            {{ $especialidade->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.especialidade.fields.ativo') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled {{ $especialidade->ativo ? "checked" : "" }}>
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