@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.parceiro.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.parceiros.update", [$parceiro->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="nome">{{ trans('cruds.parceiro.fields.nome') }}*</label>
                <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome', isset($parceiro) ? $parceiro->nome : '') }}" required>
                @if($errors->has('nome'))
                    <p class="help-block">
                        {{ $errors->first('nome') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.parceiro.fields.nome_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('detalhes') ? 'has-error' : '' }}">
                <label for="detalhes">{{ trans('cruds.parceiro.fields.detalhes') }}*</label>
                <textarea id="detalhes" name="detalhes" class="form-control " required>{{ old('detalhes', isset($parceiro) ? $parceiro->detalhes : '') }}</textarea>
                @if($errors->has('detalhes'))
                    <p class="help-block">
                        {{ $errors->first('detalhes') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.parceiro.fields.detalhes_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('endereco') ? 'has-error' : '' }}">
                <label for="endereco">{{ trans('cruds.parceiro.fields.endereco') }}*</label>
                <input type="text" id="endereco" name="endereco" class="form-control" value="{{ old('endereco', isset($parceiro) ? $parceiro->endereco : '') }}" required>
                @if($errors->has('endereco'))
                    <p class="help-block">
                        {{ $errors->first('endereco') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.parceiro.fields.endereco_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('contato') ? 'has-error' : '' }}">
                <label for="contato">{{ trans('cruds.parceiro.fields.contato') }}</label>
                <textarea id="contato" name="contato" class="form-control ">{{ old('contato', isset($parceiro) ? $parceiro->contato : '') }}</textarea>
                @if($errors->has('contato'))
                    <p class="help-block">
                        {{ $errors->first('contato') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.parceiro.fields.contato_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('ativo') ? 'has-error' : '' }}">
                <label for="ativo">{{ trans('cruds.parceiro.fields.ativo') }}</label>
                <input name="ativo" type="hidden" value="0">
                <input value="1" type="checkbox" id="ativo" name="ativo" {{ (isset($parceiro) && $parceiro->ativo) || old('ativo', 0) === 1 ? 'checked' : '' }}>
                @if($errors->has('ativo'))
                    <p class="help-block">
                        {{ $errors->first('ativo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.parceiro.fields.ativo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('categoria_id') ? 'has-error' : '' }}">
                <label for="categoria">{{ trans('cruds.parceiro.fields.categoria') }}</label>
                <select name="categoria_id" id="categoria" class="form-control select2">
                    @foreach($categorias as $id => $categoria)
                        <option value="{{ $id }}" {{ (isset($parceiro) && $parceiro->categoria ? $parceiro->categoria->id : old('categoria_id')) == $id ? 'selected' : '' }}>{{ $categoria }}</option>
                    @endforeach
                </select>
                @if($errors->has('categoria_id'))
                    <p class="help-block">
                        {{ $errors->first('categoria_id') }}
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