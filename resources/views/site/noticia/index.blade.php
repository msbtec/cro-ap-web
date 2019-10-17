@extends('site.master')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
@endpush

@push('meta')
    <meta property="og:url"           content="{{ Request::url() }}" />
    <meta property="og:type"          content="website"/>
    <meta property="og:title"         content="{{ $noticia->titulo }}" />
    <meta property="og:description"   content="{{ env('APP_NAME') }}" />
    <meta property="og:image"         content="/storage/{{ $noticia->mediac->id ."/". $noticia->mediac->file_name }}" />
    <meta property="og:image:width"   content="600">
    <meta property="og:image:height"  content="400">
@endpush

@section('content')
    <div class="container mt-3" id="noticia">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('site.home') }}">Página inicial</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('site.noticias') }}">Notícias</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $noticia->titulo }}</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="small text-muted mb-2"><i class="fas fa-calendar-alt"></i> {{ date('d/m/Y',strtotime($noticia->dt_publicacao)) }}</div>
                <h5>{{ $noticia->titulo }}</h5>
                <div class="text-muted mb-4">{{ $noticia->resumo }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 pb-5">
                <a href="whatsapp://send?text={{ Request::url() }}" class="btn-wsp"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                <img src="/storage/{{ $noticia->mediac->id ."/". $noticia->mediac->file_name }}" class="img-fluid img-thumbnail mt-1" alt="Noticia">
                <p class="py-2">{!! $noticia->texto !!}</p>
                @if($midias)
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6 class="titulos_sub vermelho">Mídias relacionadas</h6>
                        </div>
                        @foreach($midias as $midia)
                            <div class="col-md-3 mb-3">
                                <a data-fancybox="gallery" href="/storage/{{ $midia->id ."/". $midia->file_name }}"><img src="/storage/{{ $midia->id ."/". $midia->file_name }}" class="img-fluid img-thumbnail" alt="Noticia"></a>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div id="disqus_thread"></div>
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
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v4.0"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script>
        function urlSite(){
            var url = window.location;
            url = url.toString();
            url = url.split(".");
            urlCont = url[3].split("/");
            url = url[1]+'.'+url[2]+'.'+urlCont[0];
        }

        var disqus_config = function () {
            this.page.url = urlSite();  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };

        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://conselho-regional-de-odontologia-do-amapa.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

@endpush
