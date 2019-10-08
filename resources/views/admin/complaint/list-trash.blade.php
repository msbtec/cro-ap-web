@extends('layouts.admin')

@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark"><i class="nav-icon fas fa-envelope"></i> DENÚNCIAS</h5>
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
                                    <a href="{{ route('admin.complaint.all') }}" class="nav-link">
                                        <i class="fa fa-inbox"></i> Geral<span class="badge bg-primary float-right">{{ $total_complaint_all->count() }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.complaint.read') }}" class="nav-link">
                                        <i class="fas fa-eye"></i> E-mails lidos<span class="badge bg-success float-right">{{ $total_complaint_read->count() }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.complaint.noread') }}" class="nav-link">
                                        <i class="fas fa-eye-slash"></i> E-mails não lidos<span class="badge bg-warning float-right">{{ $total_complaint_noread->count() }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.complaint.trash') }}" class="nav-link">
                                        <i class="fas fa-trash-alt"></i> Lixeira<span class="badge bg-danger float-right">{{ $total_complaint_trash->count() }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-9" id="contato">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0"><i class="fas fa-trash-alt"></i> Lixeira </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table id="tabela" class="table table-hover table-bordered table-striped td-action">
                                    <thead>
                                    <tr>
                                        <th>Remetente</th>
                                        <th>Mensagem</th>
                                        <th class="text-center"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($complaints as $complaint)
                                        @php $created = with(new Carbon\Carbon($complaint->created_at))->diffForHumans() @endphp
                                        <tr>
                                            <td><a href='/admin/contact/show/{{ $complaint->id }}'><span>{{ $complaint->sender }}</span></a></td>
                                            <td><a href='/admin/contact/show/{{ $complaint->id }}'><span>{{ $complaint->subject }}</span>{{  $complaint->message }}</a></td>
                                            <td class="text-center"><i class="fas fa-hourglass-start"></i> {{ $created }}
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
