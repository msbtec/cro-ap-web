@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">Adicionar Slide</div>

    {!! Form::open(['route' => 'admin.slide.store','files' => true]) !!}
    <div class="card-body">
        @include('admin.slide.form')
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-success btn-flat"><i class="fas fa-save"></i> Salvar</button>
        <a href="{{ route('admin.slide.index') }}" class="btn btn-outline-primary btn-flat"><i class="fas fa-chevron-circle-left"></i> Retornar</a>
    </div>
    {!! Form::close() !!}
</div>
@endsection

@section('scripts')
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).siblings('.custom-file-label').addClass("selected").html(fileName);

        });
    </script>
@stop
