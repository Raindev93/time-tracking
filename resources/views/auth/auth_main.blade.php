@extends('main.html_template')

@section('body')
<div class="row">
	<div class="col s12 auth-header">
		<h1 class="center-align">Time Tracking App</h1>
	</div>
	<div class="col s6">
		<div class="row">
			@foreach(trans('promo.special') as $trans)
			<div class="col s12">
				<div class="center about">
					<i class="material-icons">{{ $trans['icon'] }}</i>
					<p class="promo-caption">{{ $trans['title'] }}</p>
					<p class="light center">{{ $trans['description'] }}</p>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<div class="col s6">
		@yield('auth_body')
	</div>
</div>
@endsection