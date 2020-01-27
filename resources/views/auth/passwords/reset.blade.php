@extends('layouts.app')

@section('content')
<section class="form-center">

	<h2>{{ __('Réinitialiser le mot de passe') }}</h2>

	<form method="POST" action="{{ route('password.update') }}">
		@csrf

		<input type="hidden" name="token" value="{{ $token }}">
		<label for="email">{{ __('Adresse email') }}</label>
		<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

		@error('email')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		@enderror


		<label for="password">{{ __('Mot de passe') }}</label>
		<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

		@error('password')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		@enderror


		<label for="password-confirm">{{ __('Confirmez le mot de passe') }}</label>
		<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

		<button type="submit" class="btn">
			{{ __('Soumettre') }}
		</button>

	</form>

</section>
@endsection
