<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="follow, all" />
    <meta name="author" content="Renan Miranda - DevOps" />
    <meta name="contact" content="renanmiranda@hotmail.com.br" />
    <meta name="contact" content="contato@croap.org.br" />
    <meta name="copyright" content="Conselho Regional de Odontologia do Amapá">
    <meta name="description" content="Portal do Conselho Regional de Odontologia do Amapá" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="adontologia, conselho de odontologia, odontologia amapá">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('image/favicon/site.webmanifest') }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    @stack('meta')
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    @stack('css')
</head>
<body>
<header>
    {{--    INICIO TOPO--}}
    <div class="container-fluid" id="topo">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="float-right">
                        <i class="fas fa-phone"></i> (96) 3223-9409 <a href="#"><i class="fab fa-facebook"></i></a> <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    FIM TOPO--}}

    {{--    INICIO BANNER--}}
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('site.home') }}"><img src="{{ asset('image/logo-color.png') }}" class="img-fluid mx-auto d-block" alt="Logo"></a>
            </div>
        </div>
    </div>
    {{--    FIM BANNER--}}

    {{--    INICIO MENU--}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{ route('site.home') }}"><i class="fas fa-home text-danger"></i></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item"><a class="nav-link" href="#">Sobre o conselho</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Notícias</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Fotos e eventos</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Profissionais inscritos</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Fiscalização</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Agenda</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Transparência</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#">Fale conosco</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    {{--    FIM MENU--}}
</header>

<main>
    @yield('content')
</main>

<footer>
    <div class="container-fluid" id="rodape">
        <div class="container">
            <div class="row py-4">
                <div class="col-md-5">
                    <h5 class="titulos_sub mb-3">CRO AMAPÁ</h5>
                    O Conselho Regional de Odontologia do Amapá-CRO/AP surgiu como anseio da classe, onde éramos representação do CRO-Pará, foi criado pela Decisão CFO 27/89 de 17 de novembro de 1989, começou as suas atividades em primeiro de janeiro de 1990, e seu primeiro presidente foi o Dr. Edivan Bertoldo dos Santos, Foi criado para contribuir para o aprimoramento da Odontologia e de seus profissionais.

                    <h5 class="titulos_sub my-3">MAIS INFORMAÇÕES</h5>
                    Fone: (96) 3223-9409<br/>
                    E-mail: secretaria@croap.org.br<br/>
                    Endereço: Av. Antônio Coelho de Carvalho, Nº 2487 - Santa Rita - Macapá - AP<br/>
                    Horário de funcionamento: De Seg. à Sext. das 08:00 às 14:00<br/>
                </div>
                <div class="col-md-7">
                    <h5 class="titulos mb-3">Fale conosco</h5>
                    {!! Form::open(['route' => 'site.contact.send']) !!}
                    @include('site.forms.contact')
                    <div class="box-footer">
                        <button type="submit" class="btn btn-danger btn-sm btn-flat mt-3">Enviar Contato</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="copyright">
        <div class="container">
            <div class="row py-3">
                <div class="col-md-12">
                    Copyright © 2017 - {{ date('Y') }} Todos os direitos reservados. CRO/AP - Conselho de Odontologia do Estado do Amapá
                    <span class="float-right">Desenvolvido por: renan.miranda</span>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@stack('js')
</body>
</html>
