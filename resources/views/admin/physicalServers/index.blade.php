@extends('layouts.admin')
@section('content')
@can('physical_server_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.physical-servers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.physicalServer.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.physicalServer.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PhysicalServer">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.physicalServer.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.physicalServer.fields.type') }}
                        </th>                        
                        <th>
                            {{ trans('cruds.physicalServer.fields.responsible') }}
                        </th>                        
                        <th>
                            {{ trans('cruds.physicalServer.fields.site') }}
                        </th>
                        <th>
                            {{ trans('cruds.physicalServer.fields.building') }}
                        </th>
                        <th>
                            {{ trans('cruds.physicalServer.fields.bay') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($physicalServers as $key => $physicalServer)
                        <tr data-entry-id="{{ $physicalServer->id }}"

                        @if (($physicalServer->description==null)||
                            ($physicalServer->configuration==null)||
                            ($physicalServer->site_id==null)||
                            ($physicalServer->building_id==null)||
                            ($physicalServer->responsible==null)
                            /* ($physicalServer->serversLogicalServers()->count()==0) */
                            )
                                class="table-warning"
                        @endif

                            >
                            <td>

                            </td>
                            <td>
                                <a href="{{ route('admin.physical-servers.show', $physicalServer->id) }}">
                                {{ $physicalServer->name ?? '' }}
                                </a>
                            </td>
                            <td>
                                {!! $physicalServer->type ?? '' !!}
                            </td>
                            <td>
                                {{ $physicalServer->responsible }}
                            </td>
                            <td>
                                @if ($physicalServer->site!=null)
                                    <a href="{{ route('admin.sites.show', $physicalServer->site->id) }}">
                                        {{ $physicalServer->site->name ?? '' }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if ($physicalServer->building!=null)
                                <a href="{{ route('admin.buildings.show', $physicalServer->building->id) }}">
                                    {{ $physicalServer->building->name ?? '' }}
                                </a>
                                @endif
                            </td>
                            <td>
                                @if ($physicalServer->bay!=null)
                                <a href="{{ route('admin.bays.show', $physicalServer->bay->id) }}">
                                    {{ $physicalServer->bay->name ?? '' }}
                                </a>
                                @endif
                            </td>
                            <td>
                                @can('physical_server_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.physical-servers.show', $physicalServer->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('physical_server_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.physical-servers.edit', $physicalServer->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('physical_server_delete')
                                    <form action="{{ route('admin.physical-servers.destroy', $physicalServer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('physical_server_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.physical-servers.massDestroy') }}",
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
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 100, stateSave: true,
    "lengthMenu": [ 10, 50, 100, 500 ]    
  });
  let table = $('.datatable-PhysicalServer:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection