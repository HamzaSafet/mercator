@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.relation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.relations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.relation.fields.name') }}</label>
                <select class="form-control select2-free {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name">
                    @if (!$type_list->contains(old('name')))
                        <option> {{ old('name') }}</option>'
                    @endif
                    @foreach($name_list as $t)
                        <option {{ old('name') == $t ? 'selected' : '' }}>{{$t}}</option>
                    @endforeach
                </select>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.relation.fields.name_helper') }}</span>
            </div>

            <div class="row">
                <div class="col-sm">

                    <div class="form-group">
                        <label class="required" for="source_id">{{ trans('cruds.relation.fields.source') }}</label>
                        <select class="form-control select2 {{ $errors->has('source') ? 'is-invalid' : '' }}" name="source_id" id="source_id" required>
                            @foreach($sources as $id => $source)
                                <option value="{{ $id }}" {{ old('source_id') == $id ? 'selected' : '' }}>{{ $source }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('source'))
                            <div class="invalid-feedback">
                                {{ $errors->first('source') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.relation.fields.source_helper') }}</span>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label class="required" for="destination_id">{{ trans('cruds.relation.fields.destination') }}</label>
                        <select class="form-control select2 {{ $errors->has('destination') ? 'is-invalid' : '' }}" name="destination_id" id="destination_id" required>
                            @foreach($destinations as $id => $destination)
                                <option value="{{ $id }}" {{ old('destination_id') == $id ? 'selected' : '' }}>{{ $destination }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('destination'))
                            <div class="invalid-feedback">
                                {{ $errors->first('destination') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.relation.fields.destination_helper') }}</span>
                    </div>
                </div>
            </div>  



            <div class="form-group">
                <label class="recommended" for="type">{{ trans('cruds.relation.fields.type') }}</label>
                <select class="form-control select2-free {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type">
                    @if (!$type_list->contains(old('type')))
                        <option> {{ old('type') }}</option>'
                    @endif
                    @foreach($type_list as $t)
                        <option {{ old('type') == $t ? 'selected' : '' }}>{{$t}}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.relation.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="recommended" for="description">{{ trans('cruds.relation.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.relation.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="recommended" for="importance">{{ trans('cruds.relation.fields.importance') }}</label>

                <select class="form-control select2 {{ $errors->has('importance') ? 'is-invalid' : '' }}" name="importance" id="importance">
                    <option value="0"></option>
                    <option value="1" {{ old('importance') == 1 ? 'selected' : '' }}>{{ trans('cruds.relation.fields.importance_level.low') }}</option>
                    <option value="2" {{ old('importance') == 2 ? 'selected' : '' }}>{{ trans('cruds.relation.fields.importance_level.medium') }}</option>
                    <option value="3" {{ old('importance') == 3 ? 'selected' : '' }}>{{ trans('cruds.relation.fields.importance_level.high') }}</option>
                    <option value="4" {{ old('importance') == 4 ? 'selected' : '' }}>{{ trans('cruds.relation.fields.importance_level.critical') }}</option>
                </select>

                @if($errors->has('importance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('importance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.relation.fields.importance_helper') }}</span>
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

@section('scripts')
<script>
$(document).ready(function () {

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: []
      }
    );
  }

  $(".select2-free").select2({
        placeholder: "{{ trans('global.pleaseSelect') }}",
        allowClear: true,
        tags: true
    }) 

});
</script>

@endsection
