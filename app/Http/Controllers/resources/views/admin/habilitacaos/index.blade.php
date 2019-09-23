@extends('layouts.admin')
@section('content')
@can('habilitacao_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.habilitacaos.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.habilitacao.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.habilitacao.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.habilitacao.fields.nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.habilitacao.fields.ativo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($habilitacaos as $key => $habilitacao)
                        <tr data-entry-id="{{ $habilitacao->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $habilitacao->nome ?? '' }}
                            </td>
                            <td>
                                {{ $habilitacao->ativo ? trans('global.yes') : trans('global.no') }}
                            </td>
                            <td>
                                @can('habilitacao_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.habilitacaos.show', $habilitacao->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('habilitacao_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.habilitacaos.edit', $habilitacao->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('habilitacao_delete')
                                    <form action="{{ route('admin.habilitacaos.destroy', $habilitacao->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('habilitacao_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.habilitacaos.massDestroy') }}",
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