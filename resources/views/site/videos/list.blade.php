@extends('site.master')

@push('css')
    <link rel="stylesheet" href="{{ asset("css/youtube.css") }}">
@endpush

@push('meta')

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

    <div class="container mt-3" id="noticias_list">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('site.home') }}">Página inicial</a></li>
                    <li class="breadcrumb-item active"><a href="#">Vídeos</a></li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h5 class="titulos vermelho">Lista de vídeos</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8" id="video">
                <div class="row">
                    @foreach($videos as $v)
                        <div class="col-md-4 mb-3">
                            <div class="thumbnail">
                                <div  id="{{ $v->cod }}" class="youtubeVideoLoader"></div>
                                <div class="caption">
                                    <div class="descricao">{{ $v->name }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4 mb-5">
                @include('site.lateral')
            </div>
        </div>
    </div>
@stop

@push('js')
    <script defer src="{{ asset("js/youtube.js") }}"></script>
@endpush
