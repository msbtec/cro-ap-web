<div class="row">
    <div class="col-sm-12">
        <span class="text-danger"><i class="fas fa-calendar-alt"></i> {{ $schedule->data->formatLocalized('%d  de %B de %Y') }}</span>
        <div class="text-muted">{{ $schedule->title }}</div>
        <hr>
       @if($schedule->local) <i class="fas fa-map-marker-alt"></i> Local: {{ $schedule->local }} @endif
        <div class="text-muted mt-3">Descrição:</div>
        {{ $schedule->description }}
    </div>
</div>


