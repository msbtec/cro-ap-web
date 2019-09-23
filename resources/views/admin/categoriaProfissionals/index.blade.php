@extends('layouts.admin')
@section('content')
@can('categoria_profissional_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.categoria-profissionals.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.categoriaProfissional.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.categoriaProfissional.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.categoriaProfissional.fields.nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.categoriaProfissional.fields.sigla') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categoriaProfissionals as $key => $categoriaProfissional)
                        <tr data-entry-id="{{ $categoriaProfissional->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $categoriaProfissional->nome ?? '' }}
                            </td>
                            <td>
                                {{ $categoriaProfissional->sigla ?? '' }}
                            </td>
                            <td>
                                @can('categoria_profissional_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.categoria-profissionals.show', $categoriaProfissional->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('categoria_profissional_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.categoria-profissionals.edit', $categoriaProfissional->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('categoria_profissional_delete')
                                    <form action="{{ route('admin.categoria-profissionals.destroy', $categoriaProfissional->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('categoria_profissional_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.categoria-profissionals.massDestroy') }}",
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