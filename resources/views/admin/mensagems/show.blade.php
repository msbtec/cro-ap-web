@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.mensagem.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.mensagem.fields.id') }}
                        </th>
                        <td>
                            {{ $mensagem->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mensagem.fields.nome') }}
                        </th>
                        <td>
                            {{ $mensagem->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mensagem.fields.telefone') }}
                        </th>
                        <td>
                            {{ $mensagem->telefone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mensagem.fields.email') }}
                        </th>
                        <td>
                            {{ $mensagem->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mensagem.fields.mensagem') }}
                        </th>
                        <td>
                            {!! $mensagem->mensagem !!}
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