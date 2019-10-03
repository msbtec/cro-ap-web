@extends('layouts.admin')

@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.typetransparency.create") }}">
                Cadastrar tipo
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">Lista de tipos</div>

        <div class="card-body">
            <table id="tabela" class="table table-hover table-bordered table-striped">
                <thead>
                <tr>
                    <th>Tipo</th>
                    <th class="text-center" width="15%">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($typeTransparency as $type)
                    <tr>
                        <td>{{ $type->name }}</td>
                        <td class="text-center">
                            <a href="{{route('admin.typetransparency.edit',$type->id)}}"class="btn btn-xs btn-primary btn-flat"><i class="fa fa-edit"></i></a>
                            {!! Form::open(['method' => 'DELETE','route' => ['admin.typetransparency.destroy', $type->id], 'style' => 'display:inline']) !!}
                            <button type="submit" class="btn btn-xs btn-danger btn-flat" title="Deletar"><i class="fa fa-trash"></i></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        let table = $('#tabela').DataTable({
            autoWidth: true,
            bSort : false,
            language: {"url":"//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"}
        });
    </script>
@endsection
