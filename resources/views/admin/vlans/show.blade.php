@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.vlan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vlans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>

                <a class="btn btn-success" href="{{ route('admin.report.explore') }}?node=VLAN_{{$vlan->id}}">
                    {{ trans('global.explore') }}
                </a>

                @can('vlan_edit')
                    <a class="btn btn-info" href="{{ route('admin.vlans.edit', $vlan->id) }}">
                        {{ trans('global.edit') }}
                    </a>
                @endcan

                @can('vlan_delete')
                    <form action="{{ route('admin.vlans.destroy', $vlan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger" value="{{ trans('global.delete') }}">
                    </form>
                @endcan                
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th width="10%">
                            {{ trans('cruds.vlan.fields.name') }}
                        </th>
                        <td>
                            {{ $vlan->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vlan.fields.description') }}
                        </th>
                        <td>
                            {!! $vlan->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vlan.fields.subnetworks') }}
                        </th>
                        <td>
                            @foreach($vlan->subnetworks as $subnetwork)
                                <a href="/admin/subnetworks/{{ $subnetwork->id }}">{{ $subnetwork->name }}</a>
                                @if ($vlan->subnetworks->last()!=$subnetwork)
                                    ,
                                @endif
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vlans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
    <div class="card-footer">
        {{ trans('global.created_at') }} {{ $vlan->created_at ? $vlan->created_at->format(trans('global.timestamp')) : '' }} |
        {{ trans('global.updated_at') }} {{ $vlan->updated_at ? $vlan->updated_at->format(trans('global.timestamp')) : '' }} 
    </div>
</div>
@endsection