@extends('layouts.app')

@section('content')
<section class="form-center">

	<h2>{{ __('Confirmation du mot de passe') }}</h2>

	{{ __('Merci de confirmez votre mote de passe avant de continuer.') }}

	<form method="POST" action="{{ route('password.confirm') }}">
		@csrf

		<label for="password">{{ __('Mot de passe') }}</label>
		<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
		@error('password')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		@enderror


		<button type="submit" class="btn btn-primary">
			{{ __('Confirmez le mot de passe') }}
		</button>

		@if (Route::has('password.request'))
		<a class="btn btn-link" href="{{ route('password.request') }}">
			{{ __('Mot de passe oublié ?') }}
		</a>
		@endif
	</form>

</section>
@endsection
