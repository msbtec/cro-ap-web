@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.profissional.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.profissional.fields.id') }}
                        </th>
                        <td>
                            {{ $profissional->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profissional.fields.nome') }}
                        </th>
                        <td>
                            {{ $profissional->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profissional.fields.cro') }}
                        </th>
                        <td>
                            {{ $profissional->cro }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profissional.fields.cpf') }}
                        </th>
                        <td>
                            {{ $profissional->cpf }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profissional.fields.categoria') }}
                        </th>
                        <td>
                            {{ $profissional->categoria->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profissional.fields.data_nascimento') }}
                        </th>
                        <td>
                            {{ $profissional->data_nascimento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profissional.fields.fone_1') }}
                        </th>
                        <td>
                            {{ $profissional->fone_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profissional.fields.fone_2') }}
                        </th>
                        <td>
                            {{ $profissional->fone_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profissional.fields.fone_3') }}
                        </th>
                        <td>
                            {{ $profissional->fone_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profissional.fields.foto') }}
                        </th>
                        <td>
                            @if($profissional->foto)
                                <a href="{{ $profissional->foto->getUrl() }}" target="_blank">
                                    <img src="{{ $profissional->foto->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profissional.fields.cep') }}
                        </th>
                        <td>
                            {{ $profissional->cep }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profissional.fields.municipio') }}
                        </th>
                        <td>
                            {{ $profissional->municipio->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profissional.fields.logradouro') }}
                        </th>
                        <td>
                            {{ $profissional->logradouro }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profissional.fields.numero') }}
                        </th>
                        <td>
                            {{ $profissional->numero }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profissional.fields.complemento') }}
                        </th>
                        <td>
                            {{ $profissional->complemento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profissional.fields.bairro') }}
                        </th>
                        <td>
                            {{ $profissional->bairro }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profissional.fields.tipo_endereco') }}
                        </th>
                        <td>
                            {{ App\Profissional::TIPO_ENDERECO_SELECT[$profissional->tipo_endereco] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Especialidades
                        </th>
                        <td>
                            @foreach($profissional->especialidades as $id => $especialidades)
                                <span class="label label-info label-many">{{ $especialidades->nome }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Habilitações
                        </th>
                        <td>
                            @foreach($profissional->habilitacoes as $id => $habilitacoes)
                                <span class="label label-info label-many">{{ $habilitacoes->nome }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection