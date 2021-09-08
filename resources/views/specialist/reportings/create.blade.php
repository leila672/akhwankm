@extends('layouts.specialist')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.reporting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reportings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="report_type_id">{{ trans('cruds.reporting.fields.report_type') }}</label>
                <select class="form-control select2 {{ $errors->has('report_type') ? 'is-invalid' : '' }}" name="report_type_id" id="report_type_id" required>
                    @foreach($report_types as $id => $entry)
                        <option value="{{ $id }}" {{ old('report_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('report_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('report_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reporting.fields.report_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="big_brother_id">{{ trans('cruds.reporting.fields.big_brother') }}</label>
                <select class="form-control select2 {{ $errors->has('big_brother') ? 'is-invalid' : '' }}" name="big_brother_id" id="big_brother_id" required>
                    @foreach($big_brothers as $id => $entry)
                        <option value="{{ $id }}" {{ old('big_brother_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('big_brother'))
                    <div class="invalid-feedback">
                        {{ $errors->first('big_brother') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reporting.fields.big_brother_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.reporting.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reporting.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="day">{{ trans('cruds.reporting.fields.day') }}</label>
                <input class="form-control {{ $errors->has('day') ? 'is-invalid' : '' }}" type="text" name="day" id="day" value="{{ old('day', '') }}" required>
                @if($errors->has('day'))
                    <div class="invalid-feedback">
                        {{ $errors->first('day') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reporting.fields.day_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="time">{{ trans('cruds.reporting.fields.time') }}</label>
                <input class="form-control timepicker {{ $errors->has('time') ? 'is-invalid' : '' }}" type="text" name="time" id="time" value="{{ old('time') }}" required>
                @if($errors->has('time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reporting.fields.time_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="number_of_repeat_offences">{{ trans('cruds.reporting.fields.number_of_repeat_offences') }}</label>
                <input class="form-control {{ $errors->has('number_of_repeat_offences') ? 'is-invalid' : '' }}" type="number" name="number_of_repeat_offences" id="number_of_repeat_offences" value="{{ old('number_of_repeat_offences', '') }}" step="1" required>
                @if($errors->has('number_of_repeat_offences'))
                    <div class="invalid-feedback">
                        {{ $errors->first('number_of_repeat_offences') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reporting.fields.number_of_repeat_offences_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="violation_summary">{{ trans('cruds.reporting.fields.violation_summary') }}</label>
                <textarea class="form-control {{ $errors->has('violation_summary') ? 'is-invalid' : '' }}" name="violation_summary" id="violation_summary" required>{{ old('violation_summary') }}</textarea>
                @if($errors->has('violation_summary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('violation_summary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reporting.fields.violation_summary_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="specialist_id">{{ trans('cruds.reporting.fields.specialist') }}</label>
                <select class="form-control select2 {{ $errors->has('specialist') ? 'is-invalid' : '' }}" name="specialist_id" id="specialist_id" required>
                    @foreach($specialists as $id => $entry)
                        <option value="{{ $id }}" {{ old('specialist_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('specialist'))
                    <div class="invalid-feedback">
                        {{ $errors->first('specialist') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reporting.fields.specialist_helper') }}</span>
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