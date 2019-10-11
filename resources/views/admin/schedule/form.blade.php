<div class="row">
    <div class="col-sm-10 mb-3">
        {!! Form::label('title', 'Título'); !!}
        {!! Form::text('title',null,['class' => 'form-control' . ( $errors->has('title') ? ' is-invalid' : '' )]) !!}
        @if ($errors->has('title'))
            <small class="form-text text-danger">{{ $errors->first('title') }}</small>
        @endif
    </div>

    <div class="col-sm-2 mb-3">
        {!! Form::label('data', 'Data'); !!}
        {!! Form::date('data',null,['class' => 'form-control text-center' . ( $errors->has('data') ? ' is-invalid' : '' )]) !!}
        @if ($errors->has('data'))
            <small class="form-text text-danger">{{ $errors->first('data') }}</small>
        @endif
    </div>

    <div class="col-sm-12 mb-3">
        {!! Form::label('local', 'Local'); !!}
        {!! Form::text('local',null,['class' => 'form-control' . ( $errors->has('local') ? ' is-invalid' : '' )]) !!}
        @if ($errors->has('local'))
            <small class="form-text text-danger">{{ $errors->first('local') }}</small>
        @endif
    </div>

    <div class="col-sm-12 mb-3">
        {!! Form::label('description', 'Descrição') !!}
        {!! Form::text('description',null,['class' => 'form-control' . ( $errors->has('description') ? ' is-invalid' : '' )]) !!}
        @if ($errors->has('description'))
            <small class="form-text text-danger">{{ $errors->first('description') }}</small>
        @endif
    </div>

</div>

