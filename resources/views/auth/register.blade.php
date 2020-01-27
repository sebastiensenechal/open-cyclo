@extends('layouts.app')

@section('content')
<section class="form-center">

	<h2>{{ __('Inscription') }}</h2>

	<form method="POST" action="{{ route('register') }}">
		@csrf

		<label for="name">{{ __('Pseudo') }}</label>
		<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
		@error('name')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		@enderror


		<label for="email">{{ __('Adresse email') }}</label>
		<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
			{{ __('S\'inscrire') }}
		</button>

	</form>
</section>
@endsection
