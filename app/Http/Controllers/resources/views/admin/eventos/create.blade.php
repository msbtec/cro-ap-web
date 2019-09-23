@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.evento.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.eventos.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }}">
                <label for="titulo">{{ trans('cruds.evento.fields.titulo') }}*</label>
                <input type="text" id="titulo" name="titulo" class="form-control" value="{{ old('titulo', isset($evento) ? $evento->titulo : '') }}" required>
                @if($errors->has('titulo'))
                    <p class="help-block">
                        {{ $errors->first('titulo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.evento.fields.titulo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('data') ? 'has-error' : '' }}">
                <label for="data">{{ trans('cruds.evento.fields.data') }}*</label>
                <input type="text" id="data" name="data" class="form-control date" value="{{ old('data', isset($evento) ? $evento->data : '') }}" required>
                @if($errors->has('data'))
                    <p class="help-block">
                        {{ $errors->first('data') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.evento.fields.data_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('informacoes') ? 'has-error' : '' }}">
                <label for="informacoes">{{ trans('cruds.evento.fields.informacoes') }}</label>
                <textarea id="informacoes" name="informacoes" class="form-control ckeditor">{{ old('informacoes', isset($evento) ? $evento->informacoes : '') }}</textarea>
                @if($errors->has('informacoes'))
                    <p class="help-block">
                        {{ $errors->first('informacoes') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.evento.fields.informacoes_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('imagens') ? 'has-error' : '' }}">
                <label for="imagens">{{ trans('cruds.evento.fields.imagens') }}</label>
                <div class="needsclick dropzone" id="imagens-dropzone">

                </div>
                @if($errors->has('imagens'))
                    <p class="help-block">
                        {{ $errors->first('imagens') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.evento.fields.imagens_helper') }}
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
    var uploadedImagensMap = {}
Dropzone.options.imagensDropzone = {
    url: '{{ route('admin.eventos.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="imagens[]" value="' + response.name + '">')
      uploadedImagensMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedImagensMap[file.name]
      }
      $('form').find('input[name="imagens[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($evento) && $evento->imagens)
      var files =
        {!! json_encode($evento->imagens) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="imagens[]" value="' + file.file_name + '">')
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