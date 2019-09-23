@extends('layouts.admin')
@section('content')
@can('parceiro_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.parceiros.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.parceiro.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.parceiro.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.parceiro.fields.nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.parceiro.fields.detalhes') }}
                        </th>
                        <th>
                            {{ trans('cruds.parceiro.fields.endereco') }}
                        </th>
                        <th>
                            {{ trans('cruds.parceiro.fields.ativo') }}
                        </th>
                        <th>
                            {{ trans('cruds.parceiro.fields.categoria') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($parceiros as $key => $parceiro)
                        <tr data-entry-id="{{ $parceiro->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $parceiro->nome ?? '' }}
                            </td>
                            <td>
                                {{ $parceiro->detalhes ?? '' }}
                            </td>
                            <td>
                                {{ $parceiro->endereco ?? '' }}
                            </td>
                            <td>
                                {{ $parceiro->ativo ? trans('global.yes') : trans('global.no') }}
                            </td>
                            <td>
                                {{ $parceiro->categoria->nome ?? '' }}
                            </td>
                            <td>
                                @can('parceiro_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.parceiros.show', $parceiro->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('parceiro_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.parceiros.edit', $parceiro->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('parceiro_delete')
                                    <form action="{{ route('admin.parceiros.destroy', $parceiro->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('parceiro_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.parceiros.massDestroy') }}",
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