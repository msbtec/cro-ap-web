<div class="row">
    <div class="col-sm-12 mb-3">
        {!! Form::label('name', 'Nome'); !!}
        {!! Form::text('name',null,['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
    </div>
</div>

