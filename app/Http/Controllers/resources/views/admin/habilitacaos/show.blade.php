@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.habilitacao.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.habilitacao.fields.id') }}
                        </th>
                        <td>
                            {{ $habilitacao->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.habilitacao.fields.nome') }}
                        </th>
                        <td>
                            {{ $habilitacao->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.habilitacao.fields.ativo') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled {{ $habilitacao->ativo ? "checked" : "" }}>
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