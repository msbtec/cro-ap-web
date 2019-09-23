@extends('layouts.admin')
@section('content')
@can('profissional_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.profissionals.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.profissional.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.profissional.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.profissional.fields.nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.profissional.fields.cro') }}
                        </th>
                        <th>
                            {{ trans('cruds.profissional.fields.categoria') }}
                        </th>
                        <th>
                            {{ trans('cruds.categoriaProfissional.fields.sigla') }}
                        </th>
                        <th>
                            {{ trans('cruds.profissional.fields.fone_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.profissional.fields.foto') }}
                        </th>
                        <th>
                            {{ trans('cruds.profissional.fields.municipio') }}
                        </th>
                        <th>
                            {{ trans('cruds.profissional.fields.especialidades') }}
                        </th>
                        <th>
                            {{ trans('cruds.profissional.fields.habilitacoes') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profissionals as $key => $profissional)
                        <tr data-entry-id="{{ $profissional->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $profissional->nome ?? '' }}
                            </td>
                            <td>
                                {{ $profissional->cro ?? '' }}
                            </td>
                            <td>
                                {{ $profissional->categoria->nome ?? '' }}
                            </td>
                            <td>
                                {{ $profissional->categoria->sigla ?? '' }}
                            </td>
                            <td>
                                {{ $profissional->fone_2 ?? '' }}
                            </td>
                            <td>
                                @if($profissional->foto)
                                    <a href="{{ $profissional->foto->getUrl() }}" target="_blank">
                                        <img src="{{ $profissional->foto->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $profissional->municipio->nome ?? '' }}
                            </td>
                            <td>
                                @foreach($profissional->especialidades as $key => $item)
                                    <span class="badge badge-info">{{ $item->nome }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($profissional->habilitacoes as $key => $item)
                                    <span class="badge badge-info">{{ $item->nome }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('profissional_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.profissionals.show', $profissional->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('profissional_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.profissionals.edit', $profissional->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('profissional_delete')
                                    <form action="{{ route('admin.profissionals.destroy', $profissional->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('profissional_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.profissionals.massDestroy') }}",
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