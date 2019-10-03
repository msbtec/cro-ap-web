@extends('layouts.admin')

@push('css')
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark"><i class="nav-icon fab fa-trello"></i> Transparência</h5>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Editar</h5>
                        </div>
                        {!! Form::model($transparency, array('method' => 'PUT','files' => true, 'route' => ['admin.transparency.update', $transparency->id])) !!}
                        <div class="card-body">
                            @include('admin.transparency.form')
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-flat"><i class="fas fa-save"></i> Atualizar</button>
                            <a href="{{ route('admin.transparency.index') }}" class="btn btn-outline-primary btn-flat"><i class="fas fa-chevron-circle-left"></i> Retornar</a>
                        </div>
                        {!! Form::close() !!}
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
