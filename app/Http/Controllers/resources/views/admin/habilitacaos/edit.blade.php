@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.habilitacao.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.habilitacaos.update", [$habilitacao->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="nome">{{ trans('cruds.habilitacao.fields.nome') }}</label>
                <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome', isset($habilitacao) ? $habilitacao->nome : '') }}">
                @if($errors->has('nome'))
                    <p class="help-block">
                        {{ $errors->first('nome') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.habilitacao.fields.nome_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('ativo') ? 'has-error' : '' }}">
                <label for="ativo">{{ trans('cruds.habilitacao.fields.ativo') }}</label>
                <input name="ativo" type="hidden" value="0">
                <input value="1" type="checkbox" id="ativo" name="ativo" {{ (isset($habilitacao) && $habilitacao->ativo) || old('ativo', 0) === 1 ? 'checked' : '' }}>
                @if($errors->has('ativo'))
                    <p class="help-block">
                        {{ $errors->first('ativo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.habilitacao.fields.ativo_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection