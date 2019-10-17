@extends('site.master')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
@endpush

@section('content')
    <div class="container mt-3" id="noticia">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('site.home') }}">Página inicial</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('site.galerias') }}">Galerias</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $album->name }}</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="small text-muted mb-2"><i class="fas fa-calendar-alt"></i> {{ $album->date->formatLocalized('%d %b de %Y') }}</div>
                <h5>{{ $album->name }}</h5>
                <div class="text-muted mb-4">{{ $album->text }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 pb-5">
                <div class="row">
                    @foreach($galeria as $g)
                        <div class="col-md-4">
                            <a data-fancybox="gallery" data-caption="{{ $g->legend }}" href="{{ Storage::url($g->image) }}"><img src="{{ Storage::url($g->image) }}" alt="Foto" class="img-fluid img-thumbnail"></a>
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
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
@endpush
