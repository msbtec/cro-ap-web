@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.profissional.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.profissionals.update", [$profissional->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="nome">{{ trans('cruds.profissional.fields.nome') }}*</label>
                <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome', isset($profissional) ? $profissional->nome : '') }}" required>
                @if($errors->has('nome'))
                    <p class="help-block">
                        {{ $errors->first('nome') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.profissional.fields.nome_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('cro') ? 'has-error' : '' }}">
                <label for="cro">{{ trans('cruds.profissional.fields.cro') }}*</label>
                <input type="text" id="cro" name="cro" class="form-control" value="{{ old('cro', isset($profissional) ? $profissional->cro : '') }}" required>
                @if($errors->has('cro'))
                    <p class="help-block">
                        {{ $errors->first('cro') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.profissional.fields.cro_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('categoria_id') ? 'has-error' : '' }}">
                <label for="categoria">{{ trans('cruds.profissional.fields.categoria') }}*</label>
                <select name="categoria_id" id="categoria" class="form-control select2" required>
                    @foreach($categorias as $id => $categoria)
                        <option value="{{ $id }}" {{ (isset($profissional) && $profissional->categoria ? $profissional->categoria->id : old('categoria_id')) == $id ? 'selected' : '' }}>{{ $categoria }}</option>
                    @endforeach
                </select>
                @if($errors->has('categoria_id'))
                    <p class="help-block">
                        {{ $errors->first('categoria_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('cpf') ? 'has-error' : '' }}">
                <label for="cpf">{{ trans('cruds.profissional.fields.cpf') }}*</label>
                <input type="number" id="cpf" name="cpf" class="form-control" value="{{ old('cpf', isset($profissional) ? $profissional->cpf : '') }}" step="1" required>
                @if($errors->has('cpf'))
                    <p class="help-block">
                        {{ $errors->first('cpf') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.profissional.fields.cpf_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('data_nascimento') ? 'has-error' : '' }}">
                <label for="data_nascimento">{{ trans('cruds.profissional.fields.data_nascimento') }}*</label>
                <input type="text" id="data_nascimento" name="data_nascimento" class="form-control date" value="{{ old('data_nascimento', isset($profissional) ? $profissional->data_nascimento : '') }}" required>
                @if($errors->has('data_nascimento'))
                    <p class="help-block">
                        {{ $errors->first('data_nascimento') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.profissional.fields.data_nascimento_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fone_1') ? 'has-error' : '' }}">
                <label for="fone_1">{{ trans('cruds.profissional.fields.fone_1') }}</label>
                <input type="text" id="fone_1" name="fone_1" class="form-control" value="{{ old('fone_1', isset($profissional) ? $profissional->fone_1 : '') }}">
                @if($errors->has('fone_1'))
                    <p class="help-block">
                        {{ $errors->first('fone_1') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.profissional.fields.fone_1_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fone_2') ? 'has-error' : '' }}">
                <label for="fone_2">{{ trans('cruds.profissional.fields.fone_2') }}*</label>
                <input type="text" id="fone_2" name="fone_2" class="form-control" value="{{ old('fone_2', isset($profissional) ? $profissional->fone_2 : '') }}" required>
                @if($errors->has('fone_2'))
                    <p class="help-block">
                        {{ $errors->first('fone_2') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.profissional.fields.fone_2_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fone_3') ? 'has-error' : '' }}">
                <label for="fone_3">{{ trans('cruds.profissional.fields.fone_3') }}</label>
                <input type="text" id="fone_3" name="fone_3" class="form-control" value="{{ old('fone_3', isset($profissional) ? $profissional->fone_3 : '') }}">
                @if($errors->has('fone_3'))
                    <p class="help-block">
                        {{ $errors->first('fone_3') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.profissional.fields.fone_3_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('foto') ? 'has-error' : '' }}">
                <label for="foto">{{ trans('cruds.profissional.fields.foto') }}</label>
                <div class="needsclick dropzone" id="foto-dropzone">

                </div>
                @if($errors->has('foto'))
                    <p class="help-block">
                        {{ $errors->first('foto') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.profissional.fields.foto_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('cep') ? 'has-error' : '' }}">
                <label for="cep">{{ trans('cruds.profissional.fields.cep') }}</label>
                <input type="text" id="cep" name="cep" class="form-control" value="{{ old('cep', isset($profissional) ? $profissional->cep : '') }}">
                @if($errors->has('cep'))
                    <p class="help-block">
                        {{ $errors->first('cep') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.profissional.fields.cep_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('logradouro') ? 'has-error' : '' }}">
                <label for="logradouro">{{ trans('cruds.profissional.fields.logradouro') }}</label>
                <input type="text" id="logradouro" name="logradouro" class="form-control" value="{{ old('logradouro', isset($profissional) ? $profissional->logradouro : '') }}">
                @if($errors->has('logradouro'))
                    <p class="help-block">
                        {{ $errors->first('logradouro') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.profissional.fields.logradouro_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('numero') ? 'has-error' : '' }}">
                <label for="numero">{{ trans('cruds.profissional.fields.numero') }}</label>
                <input type="text" id="numero" name="numero" class="form-control" value="{{ old('numero', isset($profissional) ? $profissional->numero : '') }}">
                @if($errors->has('numero'))
                    <p class="help-block">
                        {{ $errors->first('numero') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.profissional.fields.numero_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('complemento') ? 'has-error' : '' }}">
                <label for="complemento">{{ trans('cruds.profissional.fields.complemento') }}</label>
                <input type="text" id="complemento" name="complemento" class="form-control" value="{{ old('complemento', isset($profissional) ? $profissional->complemento : '') }}">
                @if($errors->has('complemento'))
                    <p class="help-block">
                        {{ $errors->first('complemento') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.profissional.fields.complemento_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('bairro') ? 'has-error' : '' }}">
                <label for="bairro">{{ trans('cruds.profissional.fields.bairro') }}</label>
                <input type="text" id="bairro" name="bairro" class="form-control" value="{{ old('bairro', isset($profissional) ? $profissional->bairro : '') }}">
                @if($errors->has('bairro'))
                    <p class="help-block">
                        {{ $errors->first('bairro') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.profissional.fields.bairro_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('municipio') ? 'has-error' : '' }}">
                <label for="municipio">{{ trans('cruds.profissional.fields.municipio') }}</label>
                <input type="text" id="municipio" name="municipio" class="form-control" value="{{ old('municipio', isset($profissional) ? $profissional->municipio : '') }}">
                @if($errors->has('municipio'))
                    <p class="help-block">
                        {{ $errors->first('municipio') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.profissional.fields.municipio_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('tipo_endereco') ? 'has-error' : '' }}">
                <label for="tipo_endereco">{{ trans('cruds.profissional.fields.tipo_endereco') }}</label>
                <select id="tipo_endereco" name="tipo_endereco" class="form-control">
                    <option value="" disabled {{ old('tipo_endereco', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Profissional::TIPO_ENDERECO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tipo_endereco', $profissional->tipo_endereco) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipo_endereco'))
                    <p class="help-block">
                        {{ $errors->first('tipo_endereco') }}
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

@section('scripts')
<script>
    Dropzone.options.fotoDropzone = {
    url: '{{ route('admin.profissionals.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="foto"]').remove()
      $('form').append('<input type="hidden" name="foto" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="foto"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($profissional) && $profissional->foto)
      var file = {!! json_encode($profissional->foto) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="foto" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@stop