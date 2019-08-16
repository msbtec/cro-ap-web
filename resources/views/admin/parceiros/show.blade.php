@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.parceiro.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.parceiro.fields.id') }}
                        </th>
                        <td>
                            {{ $parceiro->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.parceiro.fields.nome') }}
                        </th>
                        <td>
                            {{ $parceiro->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.parceiro.fields.detalhes') }}
                        </th>
                        <td>
                            {!! $parceiro->detalhes !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.parceiro.fields.endereco') }}
                        </th>
                        <td>
                            {{ $parceiro->endereco }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.parceiro.fields.ativo') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled {{ $parceiro->ativo ? "checked" : "" }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.parceiro.fields.categoria') }}
                        </th>
                        <td>
                            {{ $parceiro->categoria->nome ?? '' }}
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