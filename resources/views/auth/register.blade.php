@extends('auth.auth_main')

@section('auth_body')
<div class="row">
	<div class="col s12">
		<h2>{{ __('auth.create_new_account') }}</h2>
	</div>
	<div class="col s10 offset1">
		<form method="POST" action="{{ route('register.post') }}">
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
			<div class="input-field col s12">
				<input  id="rpassword" type="password" name="password_confirmation" class="validate">
				<label for="rpassword">{{ __('forms.repeat_password') }}</label>
				@if ($errors->has('password_confirmation'))
				<span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
				@endif
			</div>
			<div class="col s12 center">
				<button class="btn waves-effect waves-light  blue lighten-1" type="submit" name="action">{{ __('forms.register') }}
					<i class="material-icons right">send</i>
				</button>
			</div>
			<div class="col s12">
				<p class="center">{!! __('auth.already_have_account') !!}</p>
			</div>
		</form>
	</div>
</div>
@endsection