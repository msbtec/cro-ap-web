@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.noticium.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.noticia.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }}">
                <label for="titulo">{{ trans('cruds.noticium.fields.titulo') }}*</label>
                <input type="text" id="titulo" name="titulo" class="form-control" value="{{ old('titulo', isset($noticium) ? $noticium->titulo : '') }}" required>
                @if($errors->has('titulo'))
                    <p class="help-block">
                        {{ $errors->first('titulo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.noticium.fields.titulo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('resumo') ? 'has-error' : '' }}">
                <label for="resumo">{{ trans('cruds.noticium.fields.resumo') }}*</label>
                <input type="text" id="resumo" name="resumo" class="form-control" value="{{ old('resumo', isset($noticium) ? $noticium->resumo : '') }}" required>
                @if($errors->has('resumo'))
                    <p class="help-block">
                        {{ $errors->first('resumo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.noticium.fields.resumo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('dt_publicacao') ? 'has-error' : '' }}">
                <label for="dt_publicacao">{{ trans('cruds.noticium.fields.dt_publicacao') }}*</label>
                <input type="text" id="dt_publicacao" name="dt_publicacao" class="form-control date" value="{{ old('dt_publicacao', isset($noticium) ? $noticium->dt_publicacao : '') }}" required>
                @if($errors->has('dt_publicacao'))
                    <p class="help-block">
                        {{ $errors->first('dt_publicacao') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.noticium.fields.dt_publicacao_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('foto_capa') ? 'has-error' : '' }}">
                <label for="foto_capa">{{ trans('cruds.noticium.fields.foto_capa') }}</label>
                <div class="needsclick dropzone" id="foto_capa-dropzone">

                </div>
                @if($errors->has('foto_capa'))
                    <p class="help-block">
                        {{ $errors->first('foto_capa') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.noticium.fields.foto_capa_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('texto') ? 'has-error' : '' }}">
                <label for="texto">{{ trans('cruds.noticium.fields.texto') }}*</label>
                <textarea id="texto" name="texto" class="form-control ckeditor">{{ old('texto', isset($noticium) ? $noticium->texto : '') }}</textarea>
                @if($errors->has('texto'))
                    <p class="help-block">
                        {{ $errors->first('texto') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.noticium.fields.texto_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fotos') ? 'has-error' : '' }}">
                <label for="fotos">{{ trans('cruds.noticium.fields.fotos') }}</label>
                <div class="needsclick dropzone" id="fotos-dropzone">

                </div>
                @if($errors->has('fotos'))
                    <p class="help-block">
                        {{ $errors->first('fotos') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.noticium.fields.fotos_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('ativo') ? 'has-error' : '' }}">
                <label for="ativo">{{ trans('cruds.noticium.fields.ativo') }}</label>
                <input name="ativo" type="hidden" value="0">
                <input value="1" type="checkbox" id="ativo" name="ativo" {{ old('ativo', 0) == 1 || old('ativo') === null ? 'checked' : '' }}>
                @if($errors->has('ativo'))
                    <p class="help-block">
                        {{ $errors->first('ativo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.noticium.fields.ativo_helper') }}
                </p>
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
/*  $('.ckeditor').each(function () {
            CKEDITOR.replace( 'texto', {
              toolbar: [
                { name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] }, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
                [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],      // Defines toolbar group without name.
                '/',                                          // Line break - next group will be placed in new line.
                { name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
              ]
            });
        //});*/


    Dropzone.options.fotoCapaDropzone = {
    url: '{{ route('admin.noticia.storeMedia') }}',
    maxFilesize: 6, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 6,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="foto_capa"]').remove()
      $('form').append('<input type="hidden" name="foto_capa" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="foto_capa"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($noticium) && $noticium->foto_capa)
      var file = {!! json_encode($noticium->foto_capa) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="foto_capa" value="' + file.file_name + '">')
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
<script>
    var uploadedFotosMap = {}
Dropzone.options.fotosDropzone = {
    url: '{{ route('admin.noticia.storeMedia') }}',
    maxFilesize: 6, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 6,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="fotos[]" value="' + response.name + '">')
      uploadedFotosMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFotosMap[file.name]
      }
      $('form').find('input[name="fotos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($noticium) && $noticium->fotos)
      var files =
        {!! json_encode($noticium->fotos) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="fotos[]" value="' + file.file_name + '">')
        }
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