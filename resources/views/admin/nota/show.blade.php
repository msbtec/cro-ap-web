@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.notum.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.notum.fields.id') }}
                        </th>
                        <td>
                            {{ $notum->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notum.fields.nota') }}
                        </th>
                        <td>
                            {!! $notum->nota !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notum.fields.anexos') }}
                        </th>
                        <td>
                            {{ $notum->anexos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notum.fields.id_usuario') }}
                        </th>
                        <td>
                            {{ $notum->id_usuario }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>
@endsection