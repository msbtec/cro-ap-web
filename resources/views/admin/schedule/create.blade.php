@extends('layouts.admin')
@section('content')

    <div class="card card-primary card-outline">
        <h5 class="card-header"> <i class="fas fa-calendar-alt"></i> Adicionar Agenda</h5>

        {!! Form::open(['route' => 'admin.schedule.store','files' => true]) !!}
        <div class="card-body">
            @include('admin.schedule.form')
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-flat"><i class="fas fa-save"></i> Salvar</button>
            <a href="{{ route('admin.schedule.index') }}" class="btn btn-outline-primary btn-flat"><i class="fas fa-chevron-circle-left"></i> Retornar</a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
@stop
