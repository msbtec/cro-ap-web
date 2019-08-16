@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.categoriaProfissional.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.categoriaProfissional.fields.id') }}
                        </th>
                        <td>
                            {{ $categoriaProfissional->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categoriaProfissional.fields.nome') }}
                        </th>
                        <td>
                            {{ $categoriaProfissional->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categoriaProfissional.fields.sigla') }}
                        </th>
                        <td>
                            {{ $categoriaProfissional->sigla }}
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