@extends('layouts.admin')

@push('css')

@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark"><i class="nav-icon fab fa-trello"></i> Tipos de transparências</h5>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">Cadastrar</h5>
                    </div>
                    {!! Form::open(['route' => 'admin.typetransparency.store']) !!}
                    <div class="card-body">
                        @include('admin.typetransparency.form')
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-flat"><i class="fas fa-save"></i> Salvar</button>
                        <a href="{{ route('admin.typetransparency.index') }}" class="btn btn-outline-primary btn-flat"><i class="fas fa-chevron-circle-left"></i> Listagem</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).siblings('.custom-file-label').addClass("selected").html(fileName);

        });
    </script>
@stop
