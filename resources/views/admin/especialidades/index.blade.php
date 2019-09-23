@extends('layouts.admin')
@section('content')
@can('especialidade_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.especialidades.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.especialidade.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.especialidade.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.especialidade.fields.nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.especialidade.fields.ativo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($especialidades as $key => $especialidade)
                        <tr data-entry-id="{{ $especialidade->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $especialidade->nome ?? '' }}
                            </td>
                            <td>
                                {{ $especialidade->ativo ? trans('global.yes') : trans('global.no') }}
                            </td>
                            <td>
                                @can('especialidade_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.especialidades.show', $especialidade->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('especialidade_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.especialidades.edit', $especialidade->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('especialidade_delete')
                                    <form action="{{ route('admin.especialidades.destroy', $especialidade->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('especialidade_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.especialidades.massDestroy') }}",
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
    order: [[ 2, 'asc' ]],
    pageLength: 100,
  });
  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection