@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Editar Slide
    </div>

    <div class="card-body">
        {!! Form::model($slide, array('method' => 'PUT', 'files' => true, 'route' => ['admin.slide.update', $slide->id])) !!}
        <div class="box-body">
            <div class="form-group">
                @include('admin.slide.form')
            </div>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-check" aria-hidden="true"></i> Atualizar</button>
            <a href="{{ route('admin.slide.index') }}" class="btn btn-warning btn-flat"><i class="fas fa-chevron-circle-left"></i> Retornar</a>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection

@section('scripts')
@stop
