<div class="row">
    <div class="col-sm-8 mb-3">
        {!! Form::label('name', 'Nome'); !!}
        {!! Form::text('name',null,['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
        @if ($errors->has('name'))
            <small class="form-text text-danger">{{ $errors->first('name') }}</small>
        @endif
    </div>

    <div class="col-sm-2 mb-3">
        {!! Form::label('cod', 'Código'); !!}
        {!! Form::text('cod',null,['class' => 'form-control' . ( $errors->has('cod') ? ' is-invalid' : '' ), 'maxlength' => '11']) !!}
        @if ($errors->has('cod'))
            <small class="form-text text-danger">{{ $errors->first('cod') }}</small>
        @endif
    </div>

    <div class="col-sm-2 mb-3">
        {!! Form::label('time', 'Duração'); !!}
        {!! Form::time('time',null,['class' => 'form-control' . ( $errors->has('time') ? ' is-invalid' : '' )]) !!}
        @if ($errors->has('time'))
            <small class="form-text text-danger">{{ $errors->first('time') }}</small>
        @endif
    </div>

    <div class="col-sm-12 mb-3">
        {!! Form::label('text', 'Descrição'); !!}
        {!! Form::text('text',null,['class' => 'form-control' . ( $errors->has('text') ? ' is-invalid' : '' )]) !!}
        @if ($errors->has('text'))
            <small class="form-text text-danger">{{ $errors->first('text') }}</small>
        @endif
    </div>


</div>

