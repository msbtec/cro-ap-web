@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.informaco.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.informacos.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('pagina') ? 'has-error' : '' }}">
                <label for="pagina">{{ trans('cruds.informaco.fields.pagina') }}*</label>
                <input type="text" id="pagina" name="pagina" class="form-control" value="{{ old('pagina', isset($informaco) ? $informaco->pagina : '') }}" required>
                @if($errors->has('pagina'))
                    <p class="help-block">
                        {{ $errors->first('pagina') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.informaco.fields.pagina_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('texto') ? 'has-error' : '' }}">
                <label for="texto">{{ trans('cruds.informaco.fields.texto') }}*</label>
                <textarea id="texto" name="texto" class="form-control ckeditor">{{ old('texto', isset($informaco) ? $informaco->texto : '') }}</textarea>
                @if($errors->has('texto'))
                    <p class="help-block">
                        {{ $errors->first('texto') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.informaco.fields.texto_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fotos') ? 'has-error' : '' }}">
                <label for="fotos">{{ trans('cruds.informaco.fields.fotos') }}</label>
                <div class="needsclick dropzone" id="fotos-dropzone">

                </div>
                @if($errors->has('fotos'))
                    <p class="help-block">
                        {{ $errors->first('fotos') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.informaco.fields.fotos_helper') }}
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
    var uploadedFotosMap = {}
Dropzone.options.fotosDropzone = {
    url: '{{ route('admin.informacos.storeMedia') }}',
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
@if(isset($informaco) && $informaco->fotos)
      var files =
        {!! json_encode($informaco->fotos) !!}
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