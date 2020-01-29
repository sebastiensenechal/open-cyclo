@extends('layouts.app')

@section('content')
<section class="form-center">

	<h2>{{ __('Inscription') }}</h2>

	<form method="POST" action="{{ route('register') }}">
		@csrf

		<label for="name" class="hidden">{{ __('Pseudo') }}</label>
		<input id="name" type="text" placeholder="Pseudo" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
		@error('name')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		@enderror
		

		<label for="email" class="hidden">{{ __('Adresse email') }}</label>
		<input id="email" type="email" placeholder="Adresse email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
		@error('email')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		@enderror


		<label for="password" class="hidden">{{ __('Mot de passe') }}</label>
		<input id="password" type="password" placeholder="Mot de passe (huit caractères minimum)" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
		@error('password')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		@enderror

		<label for="password-confirm" class="hidden">{{ __('Confirmez le mot de passe') }}</label>
		<input id="password-confirm" type="password" placeholder="Confirmez votre mot de passe" name="password_confirmation" required autocomplete="new-password">


		<button type="submit" class="btn">
			{{ __('S\'inscrire') }}
		</button>

	</form>
</section>
@endsection
