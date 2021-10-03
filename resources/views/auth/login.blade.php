@extends('auth.auth_main')

@section('auth_body')
<div class="row">
	<div class="col s12">
		<h2>{{ __('forms.login') }}</h2>
	</div>
	<div class="col s10 offset1">
		<form method="POST" action="{{ route('login.post') }}">
			@csrf
			<div class="input-field col s12">
				<input  id="email" type="email" name="email" class="validate">
				<label for="email">{{ __('forms.email') }}</label>
				@if ($errors->has('email'))
				<span class="text-danger">{{ $errors->first('email') }}</span>
				@endif
			</div>
			<div class="input-field col s12">
				<input  id="password" type="password" name="password" class="validate">
				<label for="password">{{ __('forms.password') }}</label>
				@if ($errors->has('password'))
				<span class="text-danger">{{ $errors->first('password') }}</span>
				@endif
			</div>
			@if (session('status'))
			<div class="col s12">
				<p class="center red-text text-darken-4">
					{{ session('status') }}
				</p>
			</div>
			@endif
			<div class="col s12 center">
				<button class="btn waves-effect waves-light  blue lighten-1" type="submit" name="action">{{ __('forms.login') }}
					<i class="material-icons right">send</i>
				</button>
			</div>
			<div class="col s12">
				<p class="center">{!! __('auth.dont_have_account') !!}</p>
			</div>
		</form>
	</div>
</div>
@endsection