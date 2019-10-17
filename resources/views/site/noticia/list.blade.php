@extends('site.master')

@push('css')

@endpush

@push('meta')

@endpush

@section('content')
    <div class="container mt-3" id="noticias_list">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('site.home') }}">Página inicial</a></li>
                    <li class="breadcrumb-item active"><a href="#">Notícias</a></li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h5 class="titulos vermelho">Notícias</h5>
            </div>
            <div class="col-md-8">
                @foreach($noticias as $noticia)
                    <a href="{{ route('site.noticia',$noticia->slug) }}">
                        <div class="media p-3">
                            <img src="/storage/{{ $noticia->mediac->id ."/". $noticia->mediac->file_name }}" alt="" class="mr-3 img-thumbnail" style="width:120px;">
                            <div class="media-body">
                                <div class="small text-muted mb-2"><i class="fas fa-calendar-alt"></i> {{ date('d/m/Y',strtotime($noticia->dt_publicacao)) }}</div>
                                <h6>{{ $noticia->titulo }}</h6>
                                <p class="small text-muted">{{ $noticia->resumo }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
                {{ $noticias->links() }}
            </div>
            <div class="col-md-4 mb-5">
                @include('site.lateral')
            </div>
        </div>
    </div>
@stop

@push('js')


@endpush
