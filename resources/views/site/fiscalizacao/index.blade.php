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
                    <li class="breadcrumb-item active">Fiscalização</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h5 class="titulos vermelho">Fiscalização</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12" id="fiscalizacao">
                <p>A fiscalização é um instrumento de proteção à sociedade.</p>

                <p>O profissional da saúde bucal recebe do Estado, a prerrogativa de somente ele ter a permissão e tutela da lei para atender as necessidade em saúde bucal do paciente. Em contrapartida, a mesma legislação que assegura essa prerrogativa, prevê que os profissionais sejam fiscalizados por seus pares, a fim de oferecer à comunidade uma Odontologia séria, competente e de qualidade.</p>

                <p>O CRO-AP, através de sua Comissão de Fiscalização e sua estrutura funcional, não tem poupado esforços, no sentido de desenvolver uma sistemática que, ao exercer a fiscalização com eficiência, prestigie o profissional cumpridor da lei e, proteja a população de ser enganada por pessoas não habilitadas ao exercício da Odontologia, conhecidas como "ilegais".</p>

                <p>Ao detectar irregularidades no exercício de um profissional da área odontológica, entre em contato e denuncie.</p>

                <p>Pelo telefone: (96) 3223-9409</p>

                <p>Denúncia whatsapp: (96) 9 8801-0057</p>

                <p>Pelo email: fiscalizacao@croap.org.br</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-5">
                <h5 class="titulos vermelho">Formulário</h5>
                <div class="card">
                    {!! Form::open(['route' => 'site.fiscalizacao.store']) !!}
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-8 mb-3">
                                {!! Form::label('name', 'Nome'); !!}
                                {!! Form::text('name',null,['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
                                @if ($errors->has('name'))
                                    <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                                @endif
                            </div>
                            <div class="col-sm-4 mb-3">
                                {!! Form::label('phone', 'Telefone'); !!}
                                {!! Form::text('phone',null,['class' => 'form-control text-center' . ( $errors->has('phone') ? ' is-invalid' : '' )]) !!}
                                @if ($errors->has('phone'))
                                    <small class="form-text text-danger">{{ $errors->first('phone') }}</small>
                                @endif
                            </div>

                            <div class="col-sm-8 mb-3">
                                {!! Form::label('address', 'Endereço'); !!}
                                {!! Form::text('address',null,['class' => 'form-control' . ( $errors->has('address') ? ' is-invalid' : '' )]) !!}
                                @if ($errors->has('address'))
                                    <small class="form-text text-danger">{{ $errors->first('address') }}</small>
                                @endif
                            </div>

                            <div class="col-sm-4 mb-3">
                                {!! Form::label('email', 'E-mail') !!}
                                {!! Form::email('email',null,['class' => 'form-control' . ( $errors->has('email') ? ' is-invalid' : '' )]) !!}
                                @if ($errors->has('email'))
                                    <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                                @endif
                            </div>

                            <div class="col-sm-12 mb-3">
                                {!! Form::label('message','Mensagem') !!}
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
