<div class="has-feedback {{ $errors->has('name') ? 'has-error' : '' }} form-group">
    {!! Form::text('name',null,['class' => 'form-control form-control-sm', 'autofocus' => $errors->has('name') ? 'autofocus' : null, 'placeholder' => 'Nome completo']) !!}
    @if ($errors->has('name'))
        <span class="help-block yellow">{{ $errors->first('name') }}</span>
    @endif
</div>

<div class="has-feedback {{ $errors->has('subject') ? 'has-error' : '' }} form-group">
    {!! Form::text('subject',null,['class' => 'form-control form-control-sm', 'autofocus' => $errors->has('subject') ? 'autofocus' : null,'placeholder' => 'Assunto']) !!}
    @if ($errors->has('subject'))
        <span class="help-block yellow">{{ $errors->first('subject') }}</span>
    @endif
</div>

<div class="has-feedback {{ $errors->has('email') ? 'has-error' : '' }} form-group">
    {!! Form::email('email',null,['class' => 'form-control form-control-sm', 'autofocus' => $errors->has('email') ? 'autofocus' : null,'placeholder' => 'E-mail']) !!}
    @if ($errors->has('email'))
        <span class="help-block yellow">{{ $errors->first('email') }}</span>
    @endif
</div>

<div class="has-feedback {{ $errors->has('message') ? 'has-error' : '' }}">
    {!! Form::textarea('message',null,['class' => 'form-control form-control-sm', 'rows' => '5', 'autofocus' => $errors->has('message') ? 'autofocus' : null,'placeholder' => 'Mensagem']) !!}
    @if ($errors->has('message'))
        <span class="help-block yellow">{{ $errors->first('message') }}</span>
    @endif
</div>
