@extends('layouts.admin')

@push('css')

@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark"><i class="nav-icon fas fa-video"></i> Vídeos</h5>
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
                            <h5 class="m-0">Cadastrar</h5>
                        </div>
                        {!! Form::open(['route' => 'admin.video.store']) !!}
                        <div class="card-body">
                            @include('admin.video.form')
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-flat"><i class="fas fa-save"></i> Salvar</button>
                            <a href="{{ route('admin.video.index') }}" class="btn btn-outline-primary btn-flat"><i class="fas fa-chevron-circle-left"></i> Retornar</a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('js')
@endpush
