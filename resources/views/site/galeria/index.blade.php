@extends('site.master')

@push('css')

@endpush

@section('content')
    <div class="container mt-3" id="noticia">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('site.home') }}">Página inicial</a></li>
                    <li class="breadcrumb-item active">Galerias</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h5 class="titulos vermelho">Galeria de Fotos</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 pb-5" id="midias">
                <div class="row">
                    @foreach($albums as $a)
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('site.galeria',$a->slug) }}">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ Storage::url($a->image) }}" class="img-thumbnail img-fluid" alt="foto">
                                        <div class="data">{{ $a->date->formatLocalized('%d %b de %Y') }}</div>
                                        <div class="titulo">{{ $a->name }}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{ $albums->links() }}
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                @include('site.lateral')
            </div>
        </div>
    </div>
@stop

@push('js')

@endpush
