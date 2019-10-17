@extends('site.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@push('meta')

@endpush

@section('content')
    <div class="container mt-3" id="transparencia">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('site.home') }}">Página inicial</a></li>
                    <li class="breadcrumb-item active">Transparências</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h5 class="titulos vermelho">Transparências</h5>
            </div>
        </div>
        <div class="row py-3">

            <div class="col-md-8">
                <p>A Administração Pública – seja ela nos âmbitos municipal, estadual ou federal – possui uma série de instrumentos de gestão pública. Conhecê-los e saber as funções de cada um deles é fundamental para facilitar a consulta ao Portal da Transparência e também como uma ferramenta de cidadania.</p>

                <p>O Portal da Transparência é um espaço na internet dedicado a oferecer dados oficiais da Administração Pública para a livre consulta e informação dos cidadãos.</p>

                <p>A Lei Complementar nº 131, de 27 de maio de 2009, e o Decreto Federal nº 7185, de 27 de maio de 2010, determinam que o Governo Federal, os Estados e os Municípios disponibilizem à sociedade, em tempo real, informações detalhadas sobre a execução orçamentária e financeira, em meios eletrônicos de acesso público.</p>

                <p>No Portal da Transparência estão disponíveis informações sobre Licitações, Contratos e Receitas, Despesas, Tesouraria e Recursos Humanos. Em breve novos conteúdos serão adicionados.</p>
            </div>
            <div class="col-md-4 mb-5">
                @foreach($type as $t)
                    <div class="card mb-2">
                        <div class="card-header">{{ $t->name }}</div>
                        <div class="card-body">
                            <div class="list-group">
                                @foreach($t->transparency as $tt)
                                    <a href="transparencia/{{ $t->slug }}/{{ $tt->slug }}" class="list-group-item list-group-item-action">{{ $tt->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop

@push('js')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        let table = $('#tabela').DataTable({
            autoWidth: true,
            oSearch: {"bSmart": false},
            bSort : false,
            language: {"url":"//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"}
        });
    </script>
@endpush
