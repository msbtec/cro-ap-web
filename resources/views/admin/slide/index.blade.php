@extends('layouts.admin')

@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.slide.create") }}">
                Cadastrar Slide
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">Lista de Slides</div>

        <div class="card-body">
            <table id="tabela" class="table table-hover table-bordered table-striped td-data td-action">
                <thead>
                <tr>
                    <th>Título</th>
                    <th class="text-center">Imagem</th>
                    <th class="text-center" width="15%">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($slides as $slide)
                    <tr>
                        <td>{{ $slide->title }}</td>
                        <td class="text-center"><img src="{{ Storage::url($slide->image) }}" class="img-fluid" width="50"></td>
                        <td class="text-center">
                            <a href="{{route('admin.slide.edit',$slide->id)}}"class="btn btn-xs btn-primary btn-flat"><i class="fa fa-edit"></i></a>
                            {!! Form::open(['method' => 'DELETE','route' => ['admin.slide.destroy', $slide->id], 'style' => 'display:inline']) !!}
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
