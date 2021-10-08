@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.network.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.networks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>

                @can('network_edit')
                    <a class="btn btn-info" href="{{ route('admin.networks.edit', $network->id) }}">
                        {{ trans('global.edit') }}
                    </a>
                @endcan

                @can('network_delete')
                    <form action="{{ route('admin.networks.destroy', $network->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                            {{ trans('cruds.network.fields.name') }}
                        </th>
                        <td>
                            {{ $network->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.network.fields.description') }}
                        </th>
                        <td>
                            {!! $network->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.network.fields.protocol_type') }}
                        </th>
                        <td>
                            {{ $network->protocol_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.network.fields.responsible') }}
                        </th>
                        <td>
                            {{ $network->responsible }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.network.fields.responsible_sec') }}
                        </th>
                        <td>
                            {{ $network->responsible_sec }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.network.fields.security_need') }}
                        </th>
                        <td>
                            {{ trans('global.confidentiality') }} :
                                {{ array(1=>trans('global.low'),2=>trans('global.medium'),3=>trans('global.strong'),4=>trans('global.very_strong'))
                                [$network->security_need_c] ?? "" }}
                            <br>
                            {{ trans('global.integrity') }} :
                                {{ array(1=>trans('global.low'),2=>trans('global.medium'),3=>trans('global.strong'),4=>trans('global.very_strong'))
                                [$network->security_need_i] ?? "" }}
                            <br>
                            {{ trans('global.availability') }} :
                                {{ array(1=>trans('global.low'),2=>trans('global.medium'),3=>trans('global.strong'),4=>trans('global.very_strong'))
                                [$network->security_need_a] ?? "" }}
                            <br>
                            {{ trans('global.tracability') }} :
                                {{ array(1=>trans('global.low'),2=>trans('global.medium'),3=>trans('global.strong'),4=>trans('global.very_strong'))
                                [$network->security_need_t] ?? "" }}                                                        
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.network.fields.subnetworks') }}
                        </th>
                        <td>
                            @foreach($network->subnetworks as $key => $subnetworks)
                                <span class="label label-info">{{ $subnetworks->name }}</span>
                                @if ($network->subnetworks->last()<>$subnetworks)
                                ,
                                @endif
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.networks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>


@endsection