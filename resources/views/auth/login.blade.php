@extends('auth.auth_main')

@section('auth_body')
<div class="row">
	<div class="col s12">
		<h2>{{ __('forms.login') }}</h2>
	</div>
	<div class="col s10 offset1">
		<div class="input-field col s12">
			<input  id="email" type="email" class="validate">
			<label for="email">{{ __('forms.email') }}</label>
		</div>
		<div class="input-field col s12">
			<input  id="password" type="password" class="validate">
			<label for="password">{{ __('forms.password') }}</label>
		</div>
		<div class="col s12 center">
			<button class="btn waves-effect waves-light  blue lighten-1" type="submit" name="action">{{ __('forms.login') }}
				<i class="material-icons right">send</i>
			</button>
		</div>
		<div class="col s12">
			<p class="center">{{ __('auth.dont_have_account') }}</p>
		</div>
	</div>
</div>
@endsection