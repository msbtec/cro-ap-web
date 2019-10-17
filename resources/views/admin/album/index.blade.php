@extends('layouts.admin')

@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
   
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0 text-dark"><i class="nav-icon fas fa-images"></i> Galeria de foto</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="m-0">Listagem <span class="float-right"><a href="{{route('admin.album.create')}}" class="btn btn-flat btn-sm btn-primary"><i class="fas fa-plus"></i> Adicionar</a> </span> </h5>
                            </div>
                            <div class="card-body">
                                <table id="tabela" class="table table-hover table-bordered table-striped td-data td-action">
                                    <thead>
                                    <tr>
                                        <th width="10%" class="text-center">Data</th>
                                        <th>Nome do álbum</th>
                                        <th class="text-center" width="15%">Pasta</th>
                                        <th class="text-center" width="15%">Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($albums as $album)
                                            <tr>
                                                <td class="text-center">{{ date('d/m/Y',strtotime($album->date)) }}</td>
                                                <td>{{ $album->name }}</td>
                                                <td class="text-center">{{ $album->folder }}</td>
                                                <td class="text-center">
                                                    <a href="album/{{ $album->id}}" class="btn btn-success btn-xs btn-flat"><i class="fas fa-cloud-upload-alt"></i></a>
                                                    <a href="{{route('admin.album.edit',$album->id)}}"class="btn btn-xs btn-primary btn-flat"><i class="fa fa-edit"></i></a>
                                                    {!! Form::open(['method' => 'DELETE','route' => ['admin.album.destroy', $album->id], 'style' => 'display:inline']) !!}
                                                    <button type="submit" class="btn btn-xs btn-danger btn-flat" title="Deletar"><i class="fa fa-trash"></i></button>
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
            language: {
                "url":"//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
            }
        });
    </script>
@stop
