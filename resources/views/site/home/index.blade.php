@extends('site.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset("css/youtube.css") }}">
@endpush

@section('content')
    <!-- Modal Videos -->
    <div class="modal fade" id="youtubeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="videoModalContainer">

                    </div>
                </div>
                <div class="modal-footer bg-dark">
                    <button id="CloseModalButton" type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fechar Janela</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Agenda -->
    <div class="modal fade" id="ModalSchedule" tabindex="-1" role="dialog" aria-labelledby="scheduleLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h6 class="modal-title">Mais informações</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Fechar janela</button>
                </div>
            </div>
        </div>
    </div>


    {{--    INICIO SLIDE--}}
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8">
                <div id="slide" class="carousel slide carousel-fade" data-ride="carousel">
                    <ul class="carousel-indicators">
                        <li data-target="#slide" data-slide-to="0" class="active"></li>
                        <li data-target="#slide" data-slide-to="1"></li>
                        <li data-target="#slide" data-slide-to="2"></li>
                    </ul>

                    <div class="carousel-inner">
                        @foreach($sliders as $slide)
                            <div class="carousel-item {{ $loop->first ? ' active' : '' }}">
                                <img src="{{ asset('storage/'.$slide->image) }}" alt="{{ $slide->title }}" class="img-fluid">
                                <div class="carousel-caption">
                                    <h4>{{ $slide->title }}</h4>
                                    <p>{{ $slide->subtitle }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-4" id="agenda">
                <h5 class="titulos vermelho">Agenda de eventos</h5>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="text-center"><i class="fas fa-calendar-alt"></i></th>
                        <th>Descrição</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($schedules as $schedule)
                        <tr>
                            <td class="text-center"><span class="badge badge-danger">{{ $schedule->data->formatLocalized('%d %b') }}</span></td>
                            <td><a href="#" data-toggle="modal" data-target="#ModalSchedule" data-schedule="{{ $schedule->id }}">{{ $schedule->title }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="{{ route('site.schedules') }}" class="btn btn-dark btn-sm">Todos os eventos</a>
            </div>
        </div>
    </div>
    {{--    FIM SLIDE--}}

    {{--    INICIO LINKS--}}
    <div class="container" id="links">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Atualização Cadastral</div>
                    <div class="card-body">
                        <div class="media">
                            <i class="fas fa-file-alt fa-3x text-danger"></i>
                            <div class="media-body ml-3">
                                Mantenha sempre suas informações atualizadas para que possa exigir seus direitos.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Pagamento de anuidade</div>
                    <div class="card-body">
                        <div class="media">
                            <i class="fas fa-hand-holding-usd fa-3x text-danger"></i>
                            <div class="media-body ml-3">
                                O acesso via site garante maior segurança e facilidade ao documento.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Documentos para inscrições</div>
                    <div class="card-body">
                        <div class="media">
                            <i class="fas fa-file-pdf fa-3x text-danger"></i>
                            <div class="media-body ml-3">
                                Documentos necessários para que você possa realizar suas inscrições.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    FIM LINKS--}}

    {{--    INICIO NOTÍCIAS--}}
    <div class="container my-5" id="noticias">
        <div class="row">
            <div class="col-md-12">
                <h5 class="titulos_sub vermelho">Últimas notícias</h5>
            </div>
        </div>
        <div class="row">
            @foreach($noticias as $noticia)
                <div class="col-md-3">
                    <a href="{{ route('site.noticia',$noticia->slug) }}">
                        <div class="card">
                            <div class="card-header">
                                <img src="/storage/{{ $noticia->mediac->id ."/". $noticia->mediac->file_name }}" class="img-fluid img-thumbnail" alt="Notícia">
                                <div class="data">{{ $noticia->dt_publicacao }}</div>
                                <div class="titulo">{{ $noticia->titulo }}</div>
                                <div class="resumo">{{ $noticia->resumo }}</div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="col-md-12 my-3">
                <a href="{{ route('site.noticias') }}" class="btn btn-dark btn-sm">Todos as notícias</a>
            </div>
        </div>
    </div>
    {{--FIM NOTÍCIAS--}}


    {{--    INICIO ATALHOS--}}
    <div class="container-fluid py-5" id="atalhos">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('site.fiscalizacao') }}">
                        <div class="text-center">
                            <img src="{{ asset('image/spy.png') }}" class="img-fluid mb-3" alt="Fiscalização">
                            <h5 class="titulos_sub">e-Sic Fiscalização</h5>
                            A fiscalização é um instrumento de proteção à sociedade.
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{ route('site.transparency.index') }}">
                        <div class="text-center">
                            <img src="{{ asset('image/trans.png') }}" class="img-fluid mb-3" alt="Transparência">
                            <h5 class="titulos_sub">Portal da transparência</h5>
                            Espaço dedicado a oferecer dados oficiais da Administração Pública para a livre consulta e informação dos cidadãos.
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="perguntas-frequentes">
                        <div class="text-center">
                            <img src="{{ asset('image/duvidas.png') }}" class="img-fluid mb-3" alt="Dúvidas frequentes">
                            <h5 class="titulos_sub">Dúvidas frequentes</h5>
                            Pensando em esclarecer e informar, a Comissão preparou essas perguntas e respostas sobre as principais consultas jurídicas.
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{--    FIM ATALHOS--}}

    {{--    INICIO MIDIAS--}}
    <div class="container-fluid py-5" id="midias">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h5 class="titulos_sub">Eventos recentes</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="owl-carousel owl-theme">
                                @foreach($album as $a)
                                    <a href="{{ route('site.galeria',$a->slug) }}">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="{{ Storage::url($a->image) }}" class="img-thumbnail img-fluid" alt="foto">
                                                <div class="data">{{ $a->date->formatLocalized('%d %b de %Y') }}</div>
                                                <div class="titulo">{{ $a->name }}</div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <a href="{{ route('site.galerias') }}" class="btn btn-sm btn-dark mt-4">Ver todos</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" id="video">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="titulos_sub mb-4">Vídeos</h5>
                            @foreach($video as $v)
                                <div class="thumbnail">
                                    <div  id="{{ $v->cod }}" class="youtubeVideoLoader"></div>
                                    <div class="caption">
                                        <div class="descricao">{{ $v->name }}</div>
                                    </div>
                                </div>
                            @endforeach
                            <a href="{{ route('site.videos') }}" class="btn btn-sm btn-dark">Todos os vídeos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    FIM MIDIAS--}}

    {{--    INICIO MAPA--}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5 class="titulos mb-4">Como chegar até nós</h5>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.817663587093!2d-51.07549088471831!3d0.032874799976027866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8d61e10c76e0a091%3A0xcd3d5157192af021!2sConselho%20Regional%20De%20Odontologia!5e0!3m2!1spt-BR!2sbr!4v1570708862676!5m2!1spt-BR!2sbr" width="100%" height="350"  style="border:0;" allowfullscreen=""></iframe>
        </div>
    </div>
    {{--    FIM MAPA--}}
@stop

@push('js')
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script defer src="{{ asset("js/youtube.js") }}"></script>
    <script>
        //CAROULSEL
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            autoplay:true,
            autoplayHoverPause:true,
            smartSpeed:1000,
            responsive:{0:{items:2}, 600:{items:3}, 1000:{items:4}
            }
        });

        //AGENDA
        var $modal = $('#ModalSchedule');
        $modal.on('show.bs.modal', function(e) {
            var schedule = $(e.relatedTarget).data('schedule');

            $(this)
                .find('.modal-body')
                .html("<div class='text-center p-5'><i class='fas fa-spinner fa-spin'></i> Carregando...</div>")
                .load('/schedule/details/' + schedule, function() {
                });
        });
    </script>
@endpush
