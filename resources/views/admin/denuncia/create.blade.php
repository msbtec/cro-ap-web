@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.denuncium.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.denuncia.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="nome">{{ trans('cruds.denuncium.fields.nome') }}</label>
                <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome', isset($denuncium) ? $denuncium->nome : '') }}">
                @if($errors->has('nome'))
                    <p class="help-block">
                        {{ $errors->first('nome') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.denuncium.fields.nome_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('telefone') ? 'has-error' : '' }}">
                <label for="telefone">{{ trans('cruds.denuncium.fields.telefone') }}</label>
                <input type="text" id="telefone" name="telefone" class="form-control" value="{{ old('telefone', isset($denuncium) ? $denuncium->telefone : '') }}">
                @if($errors->has('telefone'))
                    <p class="help-block">
                        {{ $errors->first('telefone') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.denuncium.fields.telefone_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.denuncium.fields.email') }}</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($denuncium) ? $denuncium->email : '') }}">
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.denuncium.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('texto') ? 'has-error' : '' }}">
                <label for="texto">{{ trans('cruds.denuncium.fields.texto') }}</label>
                <input type="text" id="texto" name="texto" class="form-control" value="{{ old('texto', isset($denuncium) ? $denuncium->texto : '') }}">
                @if($errors->has('texto'))
                    <p class="help-block">
                        {{ $errors->first('texto') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.denuncium.fields.texto_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.denuncium.fields.status') }}</label>
                <select id="status" name="status" class="form-control">
                    <option value="" disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Denuncium::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <p class="help-block">
                        {{ $errors->first('status') }}
                    </p>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection