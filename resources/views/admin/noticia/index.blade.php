@extends('layouts.admin')
@section('content')
@can('noticium_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.noticia.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.noticium.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.noticium.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.noticium.fields.titulo') }}
                        </th>
                        <th>
                            {{ trans('cruds.noticium.fields.dt_publicacao') }}
                        </th>
                        <th>
                            {{ trans('cruds.noticium.fields.foto_capa') }}
                        </th>
                        <th>
                            {{ trans('cruds.noticium.fields.ativo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($noticia as $key => $noticium)
                        <tr data-entry-id="{{ $noticium->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $noticium->titulo ?? '' }}
                            </td>
                            <td>
                                {{ $noticium->dt_publicacao ?? '' }}
                            </td>
                            <td>
                                @if($noticium->foto_capa)
                                    <a href="{{ $noticium->foto_capa->getUrl() }}" target="_blank">
                                        <img src="{{ $noticium->foto_capa->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $noticium->ativo ? trans('global.yes') : trans('global.no') }}
                            </td>
                            <td>
                                @can('noticium_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.noticia.show', $noticium->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('noticium_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.noticia.edit', $noticium->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('noticium_delete')
                                    <form action="{{ route('admin.noticia.destroy', $noticium->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('noticium_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.noticia.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection