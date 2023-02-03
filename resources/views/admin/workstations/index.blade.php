@extends('layouts.admin')
@section('content')
@can('workstation_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.workstations.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.workstation.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.workstation.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Workstation">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.workstation.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.workstation.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.workstation.fields.site') }}
                        </th>
                        <th>
                            {{ trans('cruds.workstation.fields.building') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($workstations as $key => $workstation)
                        <tr data-entry-id="{{ $workstation->id }}">
                            <td>

                            </td>
                            <td>
                                <a href="{{ route('admin.workstations.show', $workstation->id) }}">                                
                                {{ $workstation->name ?? '' }}
                                </a>
                            </td>
                            <td>
                                {!! $workstation->type ?? '' !!}
                            </td>
                            <td>
                                @if ($workstation->site!=null)
                                    <a href="{{ route('admin.sites.show', $workstation->site->id) }}">
                                        {{ $workstation->site->name ?? '' }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if ($workstation->building!=null)
                                <a href="{{ route('admin.buildings.show', $workstation->building->id) }}">
                                    {{ $workstation->building->name ?? '' }}
                                </a>
                                @endif
                            </td>
                            <td>
                                @can('workstation_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.workstations.show', $workstation->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('workstation_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.workstations.edit', $workstation->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('workstation_delete')
                                    <form action="{{ route('admin.workstations.destroy', $workstation->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('workstation_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.workstations.massDestroy') }}",
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
    order: [[ 1, 'asc' ]],
    pageLength: 100, stateSave: true,
  });
  $('.datatable-Workstation:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection