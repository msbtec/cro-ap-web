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
                    <li class="breadcrumb-item"><a href="{{ route('site.transparency.index') }}">Transparências</a></li>
                    <li class="breadcrumb-item">{{ $typeTransparency->name }}</li>
                    <li class="breadcrumb-item active">{{ $transparency->name }}</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h5 class="titulos vermelho">Transparências</h5>
                <div class="text-muted">{{ $typeTransparency->name }} / {{ $transparency->name }}</div>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-md-8 nopadding">
                <table class="table table-striped" id="tabela">
                    <thead class="btn-dark text-white">
                    <tr>
                        <th>Data</th>
                        <th>Descrição</th>
                        <th class="text-center" width="10%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fileTransparency as $file)
                    <tr>
                        <td>{{ $file->created_at->formatLocalized('%d %b') }}</td>
                        <td>{{ $file->name }}</td>
                        <td class="text-center"><a href="{{ Storage::url($file->file) }}" target="_blank" class="btn btn-dark btn-sm"><i class="fas fa-file-download"></i></a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 mb-5">
                @foreach($type as $t)
                    <div class="card mb-2">
                        <div class="card-header">{{ $t->name }}</div>
                        <div class="card-body">
                            <div class="list-group">
                                @foreach($t->transparency as $tt)
                                    <a href="../../transparencia/{{ $t->slug }}/{{ $tt->slug }}" class="list-group-item list-group-item-action">{{ $tt->name }}</a>
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
