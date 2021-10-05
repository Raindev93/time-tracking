@extends('main.html_template')
@section('title')
Dashboard
@endsection
@section('body')
<div class="col s12 auth-header">
	<h1 class="center-align">Time Tracking App</h1>
</div>
<div class="row">
	<div class="col s6">
		<div class="col s4">
			<div class="input-field">
				<input  id="date-from" type="text" class="datepicker report-date-change" name="date-from" >
				<label for="date-from">{{ __('forms.from') }}</label>
				@if ($errors->has('from'))
				<span class="text-danger">{{ $errors->first('from') }}</span>
				@endif
			</div>
		</div>
		<div class="col s4">
			<div class="input-field">
				<input  id="date-to" type="text" class="datepicker report-date-change" name="date-to" >
				<label for="date-to">{{ __('forms.to') }}</label>
				@if ($errors->has('to'))
				<span class="text-danger">{{ $errors->first('to') }}</span>
				@endif
			</div>
		</div>
		<div class="col s4">
			<a class="waves-effect waves-light btn" id="get-report"><i class="material-icons left">cloud</i>Generate excel</a>
		</div>
	</div>

	<div class="col s6">
		<a class="waves-effect waves-light btn modal-trigger" href="#create-modal"><i class="material-icons left">cloud</i>Create new task</a>
	</div>
</div>
<div id="tasks-table">
	{!! $tasks !!}
</div>

@include('popups.create_new_task')
@endsection