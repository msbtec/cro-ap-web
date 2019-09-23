@extends('layouts.admin')
@section('content')
@can('mensagem_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.mensagems.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.mensagem.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.mensagem.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.mensagem.fields.nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.mensagem.fields.telefone') }}
                        </th>
                        <th>
                            {{ trans('cruds.mensagem.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.mensagem.fields.mensagem') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mensagems as $key => $mensagem)
                        <tr data-entry-id="{{ $mensagem->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $mensagem->nome ?? '' }}
                            </td>
                            <td>
                                {{ $mensagem->telefone ?? '' }}
                            </td>
                            <td>
                                {{ $mensagem->email ?? '' }}
                            </td>
                            <td>
                                {{ $mensagem->mensagem ?? '' }}
                            </td>
                            <td>
                                @can('mensagem_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.mensagems.show', $mensagem->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('mensagem_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.mensagems.edit', $mensagem->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('mensagem_delete')
                                    <form action="{{ route('admin.mensagems.destroy', $mensagem->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('mensagem_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.mensagems.massDestroy') }}",
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