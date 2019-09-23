@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.mensagem.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.mensagems.update", [$mensagem->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="nome">{{ trans('cruds.mensagem.fields.nome') }}</label>
                <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome', isset($mensagem) ? $mensagem->nome : '') }}">
                @if($errors->has('nome'))
                    <p class="help-block">
                        {{ $errors->first('nome') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.mensagem.fields.nome_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('telefone') ? 'has-error' : '' }}">
                <label for="telefone">{{ trans('cruds.mensagem.fields.telefone') }}</label>
                <input type="text" id="telefone" name="telefone" class="form-control" value="{{ old('telefone', isset($mensagem) ? $mensagem->telefone : '') }}">
                @if($errors->has('telefone'))
                    <p class="help-block">
                        {{ $errors->first('telefone') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.mensagem.fields.telefone_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.mensagem.fields.email') }}</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($mensagem) ? $mensagem->email : '') }}">
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.mensagem.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('mensagem') ? 'has-error' : '' }}">
                <label for="mensagem">{{ trans('cruds.mensagem.fields.mensagem') }}</label>
                <textarea id="mensagem" name="mensagem" class="form-control ">{{ old('mensagem', isset($mensagem) ? $mensagem->mensagem : '') }}</textarea>
                @if($errors->has('mensagem'))
                    <p class="help-block">
                        {{ $errors->first('mensagem') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.mensagem.fields.mensagem_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection