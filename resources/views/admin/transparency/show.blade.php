@extends('layouts.admin')

@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark"><i class="nav-icon fab fa-trello"></i> Transparência</h5>
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
                            <h5 class="m-0">Informações</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="text-primary">Tipo: {{ $transparency->type->name }}</h6>
                            <h5 class="text-info">Nome de identificação: {{ $transparency->name }}</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Cadastrar conteúdo</h5>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'admin.filetransparency.store','files' => true]) !!}

                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        {!! Form::label('name', 'Nome do documento'); !!}
                                        {!! Form::text('name',null,['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
                                        @if ($errors->has('name'))
                                            <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                                        @endif
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        {!! Form::label('file', 'Arquivos - (DOC,PDF)'); !!}
                                        <div class="custom-file">
                                            {!! Form::file('file',['class' => 'input-group custom-file-input'. ( $errors->has('image') ? ' is-invalid' : '' )]) !!}
                                            {!! Form::label('file', 'Selecione um arquivo',['class' => 'custom-file-label']); !!}
                                            @if ($errors->has('file'))
                                                <small class="form-text text-danger">{{ $errors->first('file') }}</small>
                                            @endif
                                            {{ Form::hidden('transparency_id',$transparency->id) }}
                                        </div>
                                    </div>
                                </div>
                            <button type="submit" class="btn btn-success btn-flat"><i class="fas fa-save"></i> Cadastrar</button>
                            <a href="{{ route('admin.transparency.index') }}" class="btn btn-warning btn-flat"><i class="fas fa-hand-point-left"></i> Retornar</a>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-danger card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Arquivos cadastrados</h5>
                        </div>
                        <div class="card-body">
                            <table id="tabela" class="table table-hover table-bordered table-striped td-data td-action">
                                <thead>
                                <tr>
                                    <th>Título</th>
                                    <th class="text-center" width="10%">Arquivo</th>
                                    <th class="text-center" width="15%">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($fileTransparency as $file)
                                    <tr>
                                        <td>{{ $file->name }}</td>
                                        <td class="text-center">
                                            <a href="{{ Storage::url($file->file) }}" target="_blank" class="btn btn-success btn-xs btn-flat"><i class="far fa-file-alt"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('admin.filetransparency.edit',$file->id)}}"class="btn btn-xs btn-primary btn-flat"><i class="fa fa-edit"></i></a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['admin.filetransparency.destroy', $file->id], 'style' => 'display:inline']) !!}
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
            language: {"url":"//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"}
        });
    </script>
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).siblings('.custom-file-label').addClass("selected").html(fileName);

        });
    </script>
@endsection
