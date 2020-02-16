@extends('layouts.app')

@section('content')
<section class="form-center">
	<h2>{{ __('Connexion') }}</h2>

	<form method="POST" action="{{ route('login') }}">
		@csrf

		<label for="email" class="hidden">{{ __('Adresse email') }}</label>

		<input id="email" type="email" placeholder="Votre adresse email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

		@error('email')
		<div class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</div>
		@enderror


		<label for="password" class="hidden">{{ __('Mot de passe') }}</label>

		<input id="password" type="password" placeholder="Votre mot de passe" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

		@error('password')
		<div class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</div>
		@enderror



		<div class="checkbox">
			<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
			<label for="remember">
				{{ __('Se souvenir de moi') }}
			</label>
		</div>


		<div class="list-btn">
			<button type="submit" class="btn">
				{{ __('Connexion') }}
			</button>

			@if (Route::has('password.request'))
			<a class="btn-link" href="{{ route('password.request') }}">
				{{ __('Mot de passe oublié ?') }}
			</a>
			@endif
		</div>

	</form>
</section>
@endsection
