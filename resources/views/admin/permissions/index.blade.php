@extends('layout.master')
@section('title', 'Permissions List')
@section('parentPageTitle', 'permissions')

@section('headers')
<link rel="stylesheet" href="{{ asset('assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/tables/css/extensions/buttons.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/tables/css/datatable/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
@can('permission_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.permissions.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.permission.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                {{ trans('cruds.permission.title_singular') }} {{ trans('global.list') }}
            </div>

            <div class="card-content">
                <div class="card-body card-dashboard">
                    <div class="table-responsive">
                        <table id="usersTable" class="table table-bordered table-striped table-hover datatable ddataex-html5-export zero-configuration">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.permission.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.permission.fields.title') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permissions as $key => $permission)
                                    <tr data-entry-id="{{ $permission->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $permission->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $permission->title ?? '' }}
                                        </td>
                                        <td>

                                            @can('permission_edit')
                                                <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-info waves-effect waves-float btn-sm waves-green"><i class="zmdi zmdi-edit"></i></a>
                                            @endcan

                                            @can('permission_delete')
                                                <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger waves-effect waves-float btn-sm waves-red" value="{{ trans('global.delete') }}"><i class="zmdi zmdi-delete"></i></button>
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
        </div>
    </div>
</div>
@endsection
@section('scriptss')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('permission_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.permissions.massDestroy') }}",
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
  $('.datatable-Permission:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection


@include('admin.partials.adminscripts')
