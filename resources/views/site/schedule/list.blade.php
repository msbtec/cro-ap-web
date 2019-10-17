@extends('site.master')

@push('css')

@endpush

@push('meta')

@endpush

@section('content')
    <!-- Modal Agenda -->
    <div class="modal fade" id="ModalSchedule" tabindex="-1" role="dialog" aria-labelledby="scheduleLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h6 class="modal-title">Mais informações</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Fechar janela</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3" id="agenda">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('site.home') }}">Página inicial</a></li>
                    <li class="breadcrumb-item active"><a href="#">Agendas</a></li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h5 class="titulos vermelho">Agenda</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="text-center" width="10%"><i class="fas fa-calendar-alt"></i></th>
                        <th>Descrição</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($schedules as $schedule)
                        <tr>
                            <td class="text-center"><span class="badge badge-danger">{{ $schedule->data->formatLocalized('%d %b') }}</span></td>
                            <td><a href="#" data-toggle="modal" data-target="#ModalSchedule" data-schedule="{{ $schedule->id }}">{{ $schedule->title }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $schedules->links() }}
            </div>
            <div class="col-md-4 mb-5">
                @include('site.lateral')
            </div>
        </div>
    </div>
@stop

@push('js')
    <script>
        //AGENDA
        var $modal = $('#ModalSchedule');
        $modal.on('show.bs.modal', function(e) {
            var schedule = $(e.relatedTarget).data('schedule');

            $(this)
                .find('.modal-body')
                .html("<div class='text-center p-5'><i class='fas fa-spinner fa-spin'></i> Carregando...</div>")
                .load('/schedule/details/' + schedule, function() {
                });
        });
    </script>

@endpush
