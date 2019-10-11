@extends('layouts.admin')

@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
    <div class="card card-primary card-outline">
        <h5 class="card-header"> <i class="fas fa-calendar-alt"></i> Agenda <span class="float-right"><a href="{{route('admin.schedule.create')}}" class="btn btn-flat btn-sm btn-primary"><i class="fas fa-plus"></i> Adicionar</a> </span> </h5>

        <div class="card-body">
            <table id="tabela" class="table table-hover table-bordered table-striped td-data td-action">
                <thead>
                <tr>
                    <th class="text-center" width="15%">Data</th>
                    <th>Título</th>
                    <th class="text-center" width="15%">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($schedules as $schedule)
                    <tr>
                        <td class="text-center">{{ date('d/m/Y',strtotime($schedule->data)) }}</td>
                        <td>{{ $schedule->title }}</td>
                        <td class="text-center">
                            <a href="{{route('admin.schedule.edit',$schedule->id)}}"class="btn btn-xs btn-primary btn-flat"><i class="fa fa-edit"></i></a>
                            {!! Form::open(['method' => 'DELETE','route' => ['admin.schedule.destroy', $schedule->id], 'style' => 'display:inline']) !!}
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
