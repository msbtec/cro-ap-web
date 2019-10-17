@extends('site.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@push('meta')

@endpush

@section('content')
    <div class="container mt-3">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('site.home') }}">Página inicial</a></li>
                    <li class="breadcrumb-item active">Profissionais inscritos</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h5 class="titulos vermelho">Profissionais inscritos</h5>
            </div>
        </div>
        <div class="row py-3" id="profissionais">
            <div class="col-md-12 nopadding">
                <table class="table table-striped table-hover" id="tabela">
                    <thead class="bg-dark text-white">
                    <tr>
                        <th>Nome</th>
                        <th>CRO</th>
                        <th>Especialidades</th>
                        <th>Habilitação</th>
                        <th>Município</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($profissionais as $p)
                        <tr>
                            <td>{{ $p->nome }}</td>
                            <td>{{ $p->cro }}</td>
                            <td>
                                @foreach($p->especialidades as $es)
                                    <span class="badge badge-danger"> {{ $es->nome }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($p->habilitacoes as $ha)
                                    <span class="badge badge-danger">  {{ $ha->nome }}</span>

                                @endforeach
                            </td>
                            <td>{{ $p->municipio->nome }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
