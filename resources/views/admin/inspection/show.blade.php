@extends('layouts.admin')

@push('css')

@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark"><i class="nav-icon fas fa-envelope"></i> Fiscalização</h5>
                </div>
            </div>
        </div>
    </section>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0">Pastas </h5>
                        </div>
                        <div class="card-body p-0">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item active">
                                    <a href="{{ route('admin.inspection.all') }}" class="nav-link">
                                        <i class="fa fa-inbox"></i> Geral<span class="badge bg-primary float-right">{{ $total_inspection_all->count() }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.inspection.read') }}" class="nav-link">
                                        <i class="fas fa-eye"></i> E-mails lidos<span class="badge bg-success float-right">{{ $total_inspection_read->count() }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.inspection.noread') }}" class="nav-link">
                                        <i class="fas fa-eye-slash"></i> E-mails não lidos<span class="badge bg-warning float-right">{{ $total_inspection_noread->count() }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.inspection.trash') }}" class="nav-link">
                                        <i class="fas fa-trash-alt"></i> Lixeira<span class="badge bg-danger float-right">{{ $total_inspection_trash->count() }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-9" id="contato">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0"><i class="fas fa-book-reader"></i> Leitura <span class="float-right"><a href="{{ route('admin.inspection.all') }}" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-hand-point-left"></i> Retornar</a> <a href="{{ route('admin.inspection.trashing',$inspection->id) }}" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash-alt"></i> Mover para lixeira</a></span></h5>
                        </div>
                        <div class="card-body">
                            <div class="mailbox-read-info">
                                <h5>{{ $inspection->name }}</h5>
                                <span class="text-muted">E-mail: {{ $inspection->email }} <span class="mailbox-read-time float-right text-capitalize">{{ Date::parse($inspection->created_at)->format('l j F Y')  }} - {{ Date::parse($inspection->created_at)->format('H:i') }}h</span></span>
                                <div class="text-muted">Telefone: {{ $inspection->phone }}</div>
                            </div>
                            <div class="mailbox-read-message">
                                <strong>Mensagem</strong>
                                <p>{{ $inspection->message }}</p>
                                <hr>
                                <div class="text-info small"><strong>Lido pela última vez:</strong> {{ Date::parse($inspection->updated_at)->format('l j F Y')  }} - {{ Date::parse($inspection->updated_at)->format('H:i')  }}h </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
