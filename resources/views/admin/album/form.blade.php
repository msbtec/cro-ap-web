<div class="row">
    <div class="col-sm-6 mb-3">
        {!! Form::label('name', 'Nome'); !!}
        {!! Form::text('name',null,['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
        @if ($errors->has('name'))
            <small class="form-text text-danger">{{ $errors->first('name') }}</small>
        @endif
    </div>

    <div class="col-sm-3 mb-3">
        {!! Form::label('date', 'Data'); !!}
        {!! Form::date('date',null,['class' => 'form-control' . ( $errors->has('date') ? ' is-invalid' : '' )]) !!}
        @if ($errors->has('date'))
            <small class="form-text text-danger">{{ $errors->first('date') }}</small>
        @endif
    </div>

    <div class="col-sm-3">
        {!! Form::label('image', 'Imagem'); !!}
        <div class="custom-file">
            {!! Form::file('image',['class' => 'input-group custom-file-input'. ( $errors->has('image') ? ' is-invalid' : '' )]) !!}
            {!! Form::label('image', 'Selecione uma imagem',['class' => 'custom-file-label']); !!}
            @if ($errors->has('image'))
                <small class="form-text text-danger">{{ $errors->first('image') }}</small>
            @endif
        </div>
    </div>

    <div class="col-sm-12 mb-3">
        {!! Form::label('local', 'Local'); !!}
        {!! Form::text('local',null,['class' => 'form-control' . ( $errors->has('local') ? ' is-invalid' : '' )]) !!}
        @if ($errors->has('local'))
            <small class="form-text text-danger">{{ $errors->first('local') }}</small>
        @endif
    </div>

    <div class="col-sm-12 mb-3">
        {!! Form::label('text','Texto') !!}
        {!! Form::textarea('text',null,['name' => 'text', 'rows' => 5,'class' => 'form-control'  . ( $errors->has('text') ? ' is-invalid' : '' )]) !!}
        @if ($errors->has('text'))
            <small class="form-text text-danger">{{ $errors->first('text') }}</small>
        @endif
    </div>
</div>

