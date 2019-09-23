@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.notum.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.nota.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('nota') ? 'has-error' : '' }}">
                <label for="nota">{{ trans('cruds.notum.fields.nota') }}*</label>
                <textarea id="nota" name="nota" class="form-control ckeditor">{{ old('nota', isset($notum) ? $notum->nota : '') }}</textarea>
                @if($errors->has('nota'))
                    <p class="help-block">
                        {{ $errors->first('nota') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.notum.fields.nota_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('anexos') ? 'has-error' : '' }}">
                <label for="anexos">{{ trans('cruds.notum.fields.anexos') }}</label>
                <div class="needsclick dropzone" id="anexos-dropzone">

                </div>
                @if($errors->has('anexos'))
                    <p class="help-block">
                        {{ $errors->first('anexos') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.notum.fields.anexos_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('id_usuario') ? 'has-error' : '' }}">
                <label for="id_usuario">{{ trans('cruds.notum.fields.id_usuario') }}</label>
                <input type="number" id="id_usuario" name="id_usuario" class="form-control" value="{{ old('id_usuario', isset($notum) ? $notum->id_usuario : '') }}" step="1">
                @if($errors->has('id_usuario'))
                    <p class="help-block">
                        {{ $errors->first('id_usuario') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.notum.fields.id_usuario_helper') }}
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
    var uploadedAnexosMap = {}
Dropzone.options.anexosDropzone = {
    url: '{{ route('admin.nota.storeMedia') }}',
    maxFilesize: 50, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 50
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="anexos[]" value="' + response.name + '">')
      uploadedAnexosMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAnexosMap[file.name]
      }
      $('form').find('input[name="anexos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($notum) && $notum->anexos)
          var files =
            {!! json_encode($notum->anexos) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="anexos[]" value="' + file.file_name + '">')
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