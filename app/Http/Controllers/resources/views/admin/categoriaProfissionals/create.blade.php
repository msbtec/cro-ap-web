@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.categoriaProfissional.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.categoria-profissionals.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="nome">{{ trans('cruds.categoriaProfissional.fields.nome') }}*</label>
                <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome', isset($categoriaProfissional) ? $categoriaProfissional->nome : '') }}" required>
                @if($errors->has('nome'))
                    <p class="help-block">
                        {{ $errors->first('nome') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.categoriaProfissional.fields.nome_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('sigla') ? 'has-error' : '' }}">
                <label for="sigla">{{ trans('cruds.categoriaProfissional.fields.sigla') }}</label>
                <input type="text" id="sigla" name="sigla" class="form-control" value="{{ old('sigla', isset($categoriaProfissional) ? $categoriaProfissional->sigla : '') }}">
                @if($errors->has('sigla'))
                    <p class="help-block">
                        {{ $errors->first('sigla') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.categoriaProfissional.fields.sigla_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection