@extends('layouts.admin')
@section('content')

    <div class="card card-primary card-outline">
        <h5 class="card-header"> <i class="fas fa-calendar-alt"></i> Editar Agenda</h5>
    </div>

    <div class="card-body">
        {!! Form::model($schedule, array('method' => 'PUT', 'files' => true, 'route' => ['admin.schedule.update', $schedule->id])) !!}
        <div class="box-body">
            <div class="form-group">
                @include('admin.schedule.form')
            </div>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-check" aria-hidden="true"></i> Atualizar</button>
            <a href="{{ route('admin.schedule.index') }}" class="btn btn-warning btn-flat"><i class="fas fa-chevron-circle-left"></i> Retornar</a>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection

@section('scripts')
@stop