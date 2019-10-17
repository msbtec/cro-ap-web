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

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="img-fluid img-thumbnail" src="{{ asset('storage/'.$album->image) }}" alt="User profile picture">
                                </div>

                                <h5 class="text-center mt-2">Foto principal</h5>

                                <p class="text-muted text-center">Pasta: {{ $album->folder }}</p>
                            </div>
                        </div>
                        <div class="card card-primary card-outline">
                            <div class="card-header">Detalhes</div>
                            <div class="card-body">
                                <strong><i class="fas fa-calendar-alt"></i> Data do evento</strong>
                                <p class="text-muted">{{ date('d/m/Y',strtotime($album->date)) }}</p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Local</strong>
                                <p class="text-muted">{{ $album->local }}</p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Descrição</strong>
                                <p class="text-muted">{!!  $album->text !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card card-info card-outline">
                            <div class="card-header">Upload de foto</div>
                            {!! Form::open(['route' => 'admin.gallery.store','files' => true]) !!}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-8 mb-3">
                                        {!! Form::label('legend', 'Legenda da foto'); !!}
                                        {!! Form::text('legend',null,['class' => 'form-control' . ( $errors->has('legend') ? ' is-invalid' : '' )]) !!}
                                        @if ($errors->has('legend'))
                                            <small class="form-text text-danger">{{ $errors->first('legend') }}</small>
                                        @endif
                                    </div>

                                    <div class="col-sm-4">
                                        {!! Form::label('image', 'Imagem'); !!}
                                        <div class="custom-file">
                                            {!! Form::file('image',['class' => 'input-group custom-file-input'. ( $errors->has('image') ? ' is-invalid' : '' )]) !!}
                                            {!! Form::label('image', 'Selecione uma imagem',['class' => 'custom-file-label']); !!}
                                            @if ($errors->has('image'))
                                                <small class="form-text text-danger">{{ $errors->first('image') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success btn-flat"><i class="fas fa-save"></i> Enviar</button>
                                {!! Form::hidden('album_id',$album->id) !!}
                                {!! Form::hidden('folder',$album->folder) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>

                        <div class="card card-info card-outline">
                            <div class="card-header">Fotos cadastradas</div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th class="text-center" width="15%">Foto</th>
                                        <th>Legenda</th>
                                        <th class="text-center" width="15%">Deletar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($gallery as $g)
                                        <tr>
                                            <td class="text-center"><img src="{{ asset('/storage/'.$g->image) }}" width="100px"></td>
                                            <td>{{ $g->legend }}</td>
                                            <td class="text-center">
                                                <form action="{{ url('admin/gallery',$g->id) }}" method="post">
                                                    <input class="btn btn-danger btn-sm" type="submit" value="Deletar" />
                                                    {!! method_field('delete') !!}
                                                    {!! csrf_field() !!}
                                                </form>
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
        </section>
@endsection

@section('scripts')
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).siblings('.custom-file-label').addClass("selected").html(fileName);

        });
    </script>
@stop
