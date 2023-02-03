@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.applicationBlock.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.application-blocks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>

                <a class="btn btn-success" href="{{ route('admin.report.explore') }}?node=BLOCK_{{$applicationBlock->id}}">
                    {{ trans('global.explore') }}
                </a>

                @can('application_block_edit')
                    <a class="btn btn-info" href="{{ route('admin.application-blocks.edit', $applicationBlock->id) }}">
                        {{ trans('global.edit') }}
                    </a>
                @endcan

                @can('application_block_delete')
                    <form action="{{ route('admin.application-blocks.destroy', $applicationBlock->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                            {{ trans('cruds.applicationBlock.fields.name') }}
                        </th>
                        <td>
                            {{ $applicationBlock->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicationBlock.fields.description') }}
                        </th>
                        <td>
                            {!! $applicationBlock->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicationBlock.fields.responsible') }}
                        </th>
                        <td>
                            {{ $applicationBlock->responsible }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Applications
                        </th>
                        <td>
                            @foreach($applicationBlock->applications as $key => $application)
                                <a href="{{ route('admin.applications.show',$application->id) }}">{{ $application->name }}</a>
                                @if(!$loop->last)
                                ,
                                @endif
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.application-blocks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
    <div class="card-footer">
        {{ trans('global.created_at') }} {{ $applicationBlock->created_at ? $applicationBlock->created_at->format(trans('global.timestamp')) : '' }} |
        {{ trans('global.updated_at') }} {{ $applicationBlock->updated_at ? $applicationBlock->updated_at->format(trans('global.timestamp')) : '' }} 
    </div>
</div>
@endsection