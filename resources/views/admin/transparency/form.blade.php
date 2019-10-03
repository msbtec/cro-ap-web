<div class="row">
    <div class="col-sm-3 mb-3">
        {!! Form::label('type_id','Tipo de transparência') !!}
        <div class="input-group">
            {!! Form::select('type_id',$typetransparency,null,['class' => 'form-control select_form'. ( $errors->has('type_id') ? ' is-invalid' : '' ),'placeholder' => 'Selecione...']) !!}
            @if ($errors->has('type_id'))
                <small class="form-text text-danger">{{ $errors->first('type_id') }}</small>
            @endif
        </div>
    </div>

    <div class="col-sm-9 mb-3">
        {!! Form::label('name', 'Nome'); !!}
        {!! Form::text('name',null,['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
        @if ($errors->has('name'))
            <small class="form-text text-danger">{{ $errors->first('name') }}</small>
        @endif
    </div>
</div>

