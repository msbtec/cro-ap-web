<div class="row">
    <div class="col-sm-12 mb-3">
        {!! Form::label('title', 'Título'); !!}
        {!! Form::text('title',null,['class' => 'form-control' . ( $errors->has('title') ? ' is-invalid' : '' )]) !!}
        @if ($errors->has('title'))
            <small class="form-text text-danger">{{ $errors->first('title') }}</small>
        @endif
    </div>

    <div class="col-sm-12">
        {!! Form::label('image', 'Imagem - (1200 x 400) px'); !!}
        <div class="custom-file">
            {!! Form::file('image',['class' => 'input-group custom-file-input'. ( $errors->has('image') ? ' is-invalid' : '' )]) !!}
            {!! Form::label('image', 'Selecione uma imagem',['class' => 'custom-file-label']); !!}
            @if ($errors->has('image'))
                <small class="form-text text-danger">{{ $errors->first('image') }}</small>
            @endif
        </div>
    </div>
</div>

