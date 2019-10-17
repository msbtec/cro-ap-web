@extends('site.master')

@push('css')

@endpush

@push('meta')

@endpush

@section('content')
    <div class="container mt-3">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('site.home') }}">Página inicial</a></li>
                    <li class="breadcrumb-item active">Denúncia</li>
                </ol>
            </nav>
        </div>

        <div class="row mb-5">
            <div class="col-md-12" id="fiscalizacao">
                <h5 class="titulos vermelho">Denúncia</h5>
                <p>Por este canal você poderá denúnciar irregularidades no exercício da profissão odontológica.

                <h5 class="titulos vermelho">Atenção:</h5>

                <p>1. Quando for denúncia contra o profissional quanto a tratamento dentário ou relacionamento, este campo poderá ser usado para obter informações de como formular a denúncia.</p>

                <p>2. O CRO-AP não divulgará os dados do denunciante. O preenchimento destes é necessário para darmos retorno em relação à análise das denúncias.</p>
            </div>

            <div class="col-md-12">
                <h5 class="titulos vermelho">Formulário</h5>
                <div class="card">
                    {!! Form::open(['route' => 'site.denuncia.store']) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                {!! Form::label('name_1', 'Nome do denunciado'); !!}
                                {!! Form::text('name_1',null,['class' => 'form-control' . ( $errors->has('name_1') ? ' is-invalid' : '' )]) !!}
                                @if ($errors->has('name_1'))
                                    <small class="form-text text-danger">{{ $errors->first('name_1') }}</small>
                                @endif
                            </div>
                            <div class="col-sm-6 mb-3">
                                {!! Form::label('cro_1', 'Nº CRO do denunciado:'); !!}
                                {!! Form::text('cro_1',null,['class' => 'form-control text-center' . ( $errors->has('cro_1') ? ' is-invalid' : '' )]) !!}
                                @if ($errors->has('cro_1'))
                                    <small class="form-text text-danger">{{ $errors->first('cro_1') }}</small>
                                @endif
                            </div>

                            <div class="col-sm-12 mb-3">
                                {!! Form::label('name_2', 'Nome do denunciante'); !!}
                                {!! Form::text('name_2',null,['class' => 'form-control' . ( $errors->has('name_2') ? ' is-invalid' : '' )]) !!}
                                @if ($errors->has('name_2'))
                                    <small class="form-text text-danger">{{ $errors->first('name_2') }}</small>
                                @endif
                            </div>

                            <div class="col-sm-6 mb-3">
                                {!! Form::label('email_2', 'E-mail do denunciante') !!}
                                {!! Form::email('email_2',null,['class' => 'form-control' . ( $errors->has('email_2') ? ' is-invalid' : '' )]) !!}
                                @if ($errors->has('email_2'))
                                    <small class="form-text text-danger">{{ $errors->first('email_2') }}</small>
                                @endif
                            </div>

                            <div class="col-sm-6 mb-3">
                                {!! Form::label('telefone_2', 'Telefone do denunciante') !!}
                                {!! Form::text('telefone_2',null,['class' => 'form-control' . ( $errors->has('telefone_2') ? ' is-invalid' : '' )]) !!}
                                @if ($errors->has('telefone_2'))
                                    <small class="form-text text-danger">{{ $errors->first('telefone_2') }}</small>
                                @endif
                            </div>

                            <div class="col-sm-12 mb-3">
                                {!! Form::label('local', 'Local da Irregularidade') !!}
                                {!! Form::text('local',null,['class' => 'form-control' . ( $errors->has('local') ? ' is-invalid' : '' )]) !!}
                                @if ($errors->has('local'))
                                    <small class="form-text text-danger">{{ $errors->first('local') }}</small>
                                @endif
                            </div>

                            <div class="col-sm-12 mb-3">
                                {!! Form::label('message','Denúncia') !!}
                                {!! Form::textarea('message',null,['name' => 'message', 'rows' => 5,'class' => 'form-control'  . ( $errors->has('message') ? ' is-invalid' : '' )]) !!}
                                @if ($errors->has('message'))
                                    <small class="form-text text-danger">{{ $errors->first('message') }}</small>
                                @endif
                            </div>

                            <div class="col-sm-12 mb-3">
                                {!! app('captcha')->display() !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <small class="form-text text-danger">{{ $errors->first('g-recaptcha-response') }}</small>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-danger btn-sm btn-flat mt-3">Enviar formulário</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')

@endpush
