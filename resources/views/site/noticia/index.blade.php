@extends('site.master')

@push('css')

@endpush

@section('content')
<div class="container mt-3">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('site.home') }}">Página inicial</a></li>
                <li class="breadcrumb-item"><a href="#">Notícias</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $noticia->titulo }}</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="small text-muted">{{ $noticia->dt_publicacao->formatLocalized('%d %b') }}</div>
            <h5>{{ $noticia->titulo }}</h5>
        </div>
    </div>

</div>

@stop

@push('js')

@endpush
