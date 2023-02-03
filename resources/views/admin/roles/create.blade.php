@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.role.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.roles.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label class="required" for="title">{{ trans('cruds.role.fields.title') }}</label>
                        <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title') }}" required>
                        @if($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.role.fields.title_helper') }}</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        @php($permission = $permissions_sorted['ecosystem'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][0][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_ecosystem}"><b>{{ trans('cruds.menu.ecosystem.title_short') }}</b></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.entity.title') }}</label>
                        @php($permission = $permissions_sorted['entity'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.relation.title') }}</label>
                        @php($permission = $permissions_sorted['relation'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        @php($permission = $permissions_sorted['metier'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][0][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_ecosystem}"><b>{{ trans('cruds.menu.metier.title_short') }}</b></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.macroProcessus.title') }}</label>
                        @php($permission = $permissions_sorted['macro_processus'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.process.title') }}</label>
                        @php($permission = $permissions_sorted['process'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.activity.title') }}</label>
                        @php($permission = $permissions_sorted['activity'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.operation.title') }}</label>
                        @php($permission = $permissions_sorted['operation'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.task.title') }}</label>
                        @php($permission = $permissions_sorted['task'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.actor.title') }}</label>
                        @php($permission = $permissions_sorted['actor'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.information.title') }}</label>
                        @php($permission = $permissions_sorted['information'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        @php($permission = $permissions_sorted['application'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][0][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_ecosystem}"><b>{{ trans('cruds.menu.application.title_short') }}</b></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.applicationBlock.title') }}</label>
                        @php($permission = $permissions_sorted['application_block'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.application.title') }}</label>
                        @php($permission = $permissions_sorted['m_application'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.applicationService.title') }}</label>
                        @php($permission = $permissions_sorted['application_service'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.applicationModule.title') }}</label>
                        @php($permission = $permissions_sorted['application_module'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.database.title') }}</label>
                        @php($permission = $permissions_sorted['database'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.flux.title') }}</label>
                        @php($permission = $permissions_sorted['flux'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        @php($permission = $permissions_sorted['administration'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][0][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_ecosystem}"><b>{{ trans('cruds.menu.administration.title_short') }}</b></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.zoneAdmin.title') }}</label>
                        @php($permission = $permissions_sorted['zone_admin'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.annuaire.title') }}</label>
                        @php($permission = $permissions_sorted['annuaire'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.forestAd.title') }}</label>
                        @php($permission = $permissions_sorted['forest_ad'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.domaineAd.title') }}</label>
                        @php($permission = $permissions_sorted['domaine_ad'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        @php($permission = $permissions_sorted['infrastructure'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][0][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_ecosystem}"><b>{{ trans('cruds.menu.logical_infrastructure.title_short') }}</b></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.network.title') }}</label>
                        @php($permission = $permissions_sorted['network'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.subnetwork.title') }}</label>
                        @php($permission = $permissions_sorted['subnetwork'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.gateway.title') }}</label>
                        @php($permission = $permissions_sorted['gateway'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.externalConnectedEntity.title') }}</label>
                        @php($permission = $permissions_sorted['external_connected_entity'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.networkSwitch.title') }}</label>
                        @php($permission = $permissions_sorted['network_switch'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.router.title') }}</label>
                        @php($permission = $permissions_sorted['router'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.securityDevice.title') }}</label>
                        @php($permission = $permissions_sorted['security_device'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.dhcpServer.title') }}</label>
                        @php($permission = $permissions_sorted['dhcp_server'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.dnsserver.title') }}</label>
                        @php($permission = $permissions_sorted['dnsserver'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.logicalServer.title') }}</label>
                        @php($permission = $permissions_sorted['logical_server'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.certificate.title') }}</label>
                        @php($permission = $permissions_sorted['certificate'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        @php($permission = $permissions_sorted['physicalinfrastructure'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][0][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_ecosystem}"><b>{{ trans('cruds.menu.physical_infrastructure.title_short') }}</b></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.site.title') }}</label>
                        @php($permission = $permissions_sorted['site'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.building.title') }}</label>
                        @php($permission = $permissions_sorted['building'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.bay.title') }}</label>
                        @php($permission = $permissions_sorted['bay'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.physicalServer.title') }}</label>
                        @php($permission = $permissions_sorted['physical_server'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.workstation.title') }}</label>
                        @php($permission = $permissions_sorted['workstation'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.storageDevice.title') }}</label>
                        @php($permission = $permissions_sorted['storage_device'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.peripheral.title') }}</label>
                        @php($permission = $permissions_sorted['peripheral'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.phone.title') }}</label>
                        @php($permission = $permissions_sorted['phone'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.physicalSwitch.title') }}</label>
                        @php($permission = $permissions_sorted['physical_switch'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.physicalRouter.title') }}</label>
                        @php($permission = $permissions_sorted['physical_router'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>


                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.wifiTerminal.title') }}</label>
                        @php($permission = $permissions_sorted['wifi_terminal'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>


                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.physicalSecurityDevice.title') }}</label>
                        @php($permission = $permissions_sorted['physical_security_device'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.wan.title') }}</label>
                        @php($permission = $permissions_sorted['wan'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.man.title') }}</label>
                        @php($permission = $permissions_sorted['man'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.lan.title') }}</label>
                        @php($permission = $permissions_sorted['lan'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.vlan.title') }}</label>
                        @php($permission = $permissions_sorted['vlan'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        @php($permission = $permissions_sorted['configure'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][0][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_ecosystem}"><b>{{ trans('cruds.menu.configuration.title') }}</b></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.user.title') }}</label>
                        @php($permission = $permissions_sorted['user'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.role.title') }}</label>
                        @php($permission = $permissions_sorted['role'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][4][0] }}" value="{{ $permission['actions'][4][0] }}" {{ in_array($permission['actions'][4][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][4][0] }}">{{ $permission['actions'][4][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][0][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][3][0] }}" {{ in_array($permission['actions'][3][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][3][0] }}">{{ $permission['actions'][3][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][2][0] }}" {{ in_array($permission['actions'][2][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][2][0] }}">{{ $permission['actions'][2][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.configuration.title') }}</label>
                        @php($permission = $permissions_sorted['configuration'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][0][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.auditLog.title') }}</label>
                        @php($permission = $permissions_sorted['audit_log'])
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][0][0] }}" value="{{ $permission['actions'][0][0] }}" {{ in_array($permission['actions'][0][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][0][0] }}">{{ $permission['actions'][0][1] }}</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" name="permissions[]" data-check="{{ str_replace(' ', '_', $permission['name']) }}" id="perm_{{ $permission['actions'][1][0] }}" value="{{ $permission['actions'][1][0] }}" {{ in_array($permission['actions'][1][0], old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="for_{{ $permission['actions'][1][0] }}">{{ $permission['actions'][1][1] }}</label>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                @if($errors->has('permissions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permissions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.permissions_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
