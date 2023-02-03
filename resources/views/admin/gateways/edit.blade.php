@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.gateway.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.gateways.update", [$gateway->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.gateway.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $gateway->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gateway.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.gateway.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $gateway->description) !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gateway.fields.description_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="recommended" for="applications">{{ trans('cruds.gateway.fields.subnetworks') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('subnetworks') ? 'is-invalid' : '' }}" name="subnetworks[]" id="subnetworks" multiple>
                    @foreach($subnetworks as $id => $name)
                        <option value="{{ $id }}" {{ (in_array($id, old('subnetworks', [])) || $gateway->subnetworks->contains($id)) ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                @if($errors->has('subnetworks'))
                    <span class="text-danger">{{ $errors->first('subnetworks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.gateway.fields.subnetworks') }}</span>
            </div>


            <div class="form-group">
                <label for="authentification">{{ trans('cruds.gateway.fields.authentification') }}</label>
                <input class="form-control {{ $errors->has('authentification') ? 'is-invalid' : '' }}" type="text" name="authentification" id="authentification" value="{{ old('authentification', $gateway->authentification) }}">
                @if($errors->has('authentification'))
                    <div class="invalid-feedback">
                        {{ $errors->first('authentification') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gateway.fields.authentification_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ip">{{ trans('cruds.gateway.fields.ip') }}</label>
                <input class="form-control {{ $errors->has('ip') ? 'is-invalid' : '' }}" type="text" name="ip" id="ip" value="{{ old('ip', $gateway->ip) }}">
                @if($errors->has('ip'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ip') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gateway.fields.ip_helper') }}</span>
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