@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.subnetwork.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.subnetworks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>

                <a class="btn btn-success" href="{{ route('admin.report.explore') }}?node=SUBNETWORK_{{$subnetwork->id}}">
                    {{ trans('global.explore') }}
                </a>

                @can('subnetwork_edit')
                    <a class="btn btn-info" href="{{ route('admin.subnetworks.edit', $subnetwork->id) }}">
                        {{ trans('global.edit') }}
                    </a>
                @endcan

                @can('subnetwork_delete')
                    <form action="{{ route('admin.subnetworks.destroy', $subnetwork->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger" value="{{ trans('global.delete') }}">
                    </form>
                @endcan

            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th width='10%'>
                            {{ trans('cruds.subnetwork.fields.name') }}
                        </th>
                        <td>
                            {{ $subnetwork->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subnetwork.fields.description') }}
                        </th>
                        <td>
                            {!! $subnetwork->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subnetwork.fields.address') }}
                        </th>
                        <td>
                            {{ $subnetwork->address }}
                            ( {{ $subnetwork->ipRange() }} )
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subnetwork.fields.vlan') }}
                        </th>
                        <td>
                            @if ($subnetwork->vlan!=null)
                            <a href="{{ route('admin.vlans.show', $subnetwork->vlan->id) }}">
                                {{ $subnetwork->vlan->name ?? '' }}
                            </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subnetwork.fields.zone') }}
                        </th>
                        <td>
                            {{ $subnetwork->zone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subnetwork.fields.ip_allocation_type') }}
                        </th>
                        <td>
                            {{ $subnetwork->ip_allocation_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subnetwork.fields.responsible_exp') }}
                        </th>
                        <td>
                            {{ $subnetwork->responsible_exp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subnetwork.fields.dmz') }}
                        </th>
                        <td>
                            {{ $subnetwork->dmz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subnetwork.fields.wifi') }}
                        </th>
                        <td>
                            {{ $subnetwork->wifi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subnetwork.fields.gateway') }}
                        </th>
                        <td>
                            @if ($subnetwork->gateway!=null)
                            <a href="{{ route('admin.gateways.show', $subnetwork->gateway->id) }}">
                            {{ $subnetwork->gateway->name ?? '' }}
                            </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subnetwork.fields.network') }}
                        </th>
                        <td>
                            @if ($subnetwork->network!=null)
                            <a href="{{ route('admin.networks.show', $subnetwork->network->id) }}">
                                {{ $subnetwork->network->name ?? '' }}
                            </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.subnetworks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
    <div class="card-footer">
        {{ trans('global.created_at') }} {{ $subnetwork->created_at ? $subnetwork->created_at->format(trans('global.timestamp')) : '' }} |
        {{ trans('global.updated_at') }} {{ $subnetwork->updated_at ? $subnetwork->updated_at->format(trans('global.timestamp')) : '' }} 
    </div>
</div>
@endsection
