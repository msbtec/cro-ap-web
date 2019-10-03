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
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Cadastrar conteúdo</h5>
                        </div>
                        <div class="card-body">
                            {!! Form::model($fileTransparency, array('method' => 'PUT','files' => true, 'route' => ['admin.filetransparency.update', $fileTransparency->id])) !!}
                            <div class="card-body">
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
                                            {{ Form::hidden('transparency_id',$fileTransparency->transparency_id) }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success btn-flat"><i class="fas fa-save"></i> Atualizar</button>
                                <a href="{{ route('admin.transparency.show',$fileTransparency->transparency_id) }}" class="btn btn-warning btn-flat"><i class="fas fa-hand-point-left"></i> Retornar</a>
                            </div>
                            {!! Form::close() !!}
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
