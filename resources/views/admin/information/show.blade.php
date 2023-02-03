@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.information.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.information.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>

                <a class="btn btn-success" href="{{ route('admin.report.explore') }}?node=INFO_{{$information->id}}">
                    {{ trans('global.explore') }}
                </a>

                @can('information_edit')
                    <a class="btn btn-info" href="{{ route('admin.information.edit', $information->id) }}">
                        {{ trans('global.edit') }}
                    </a>
                @endcan

                @can('information_delete')
                    <form action="{{ route('admin.information.destroy', $information->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                            {{ trans('cruds.information.fields.name') }}
                        </th>
                        <td>
                            {{ $information->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.information.fields.description') }}
                        </th>
                        <td>
                            {!! $information->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.information.fields.owner') }}
                        </th>
                        <td>
                            {{ $information->owner }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.information.fields.administrator') }}
                        </th>
                        <td>
                            {{ $information->administrator }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.information.fields.storage') }}
                        </th>
                        <td>
                            {{ $information->storage }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.information.fields.processes') }}
                        </th>
                        <td>
                            @foreach($information->processes as $process)
                                <a href="{{ route('admin.processes.show', $process->id) }}">
                                {{ $process->identifiant }}
                                </a>
                                @if (!$loop->last)
                                ,
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.information.fields.security_need') }}
                        </th>
                        <td>
                            {{ trans('global.confidentiality') }} :
                                {{ array(0=>trans('global.none'), 1=>trans('global.low'),2=>trans('global.medium'),3=>trans('global.strong'),4=>trans('global.very_strong'))
                                [$information->security_need_c] ?? "" }}
                            <br>
                            {{ trans('global.integrity') }} :
                                {{ array(0=>trans('global.none'), 1=>trans('global.low'),2=>trans('global.medium'),3=>trans('global.strong'),4=>trans('global.very_strong'))
                                [$information->security_need_i] ?? "" }}
                            <br>
                            {{ trans('global.availability') }} :
                                {{ array(0=>trans('global.none'), 1=>trans('global.low'),2=>trans('global.medium'),3=>trans('global.strong'),4=>trans('global.very_strong'))
                                [$information->security_need_a] ?? "" }}
                            <br>
                            {{ trans('global.tracability') }} :
                                {{ array(0=>trans('global.none'), 1=>trans('global.low'),2=>trans('global.medium'),3=>trans('global.strong'),4=>trans('global.very_strong'))
                                [$information->security_need_t] ?? "" }}                                                        
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.information.fields.sensitivity') }}
                        </th>
                        <td>
                            {{ $information->sensitivity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.information.fields.constraints') }}
                        </th>
                        <td>
                            {!! $information->constraints !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.information.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
    <div class="card-footer">
        {{ trans('global.created_at') }} {{ $information->created_at ? $information->created_at->format(trans('global.timestamp')) : '' }} |
        {{ trans('global.updated_at') }} {{ $information->updated_at ? $information->updated_at->format(trans('global.timestamp')) : '' }} 
    </div>
</div>

@endsection