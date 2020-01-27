@extends('layouts.app')

@section('content')
<section class="form-center">
	<h2>{{ __('Connexion') }}</h2>

	<form method="POST" action="{{ route('login') }}">
		@csrf

		<label for="email">{{ __('Adresse email') }}</label>

		<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

		@error('email')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		@enderror


		<label for="password">{{ __('Mot de passe') }}</label>

		<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

		@error('password')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		@enderror


		<div class="form-check">
			<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

			<label for="remember">
				{{ __('Se souvenir de moi') }}
			</label>
		</div>

		<div class="form-buttons">
			<button type="submit" class="btn">
				{{ __('Connexion') }}
			</button>

			@if (Route::has('password.request'))
			<a class="btn btn-link" href="{{ route('password.request') }}">
				{{ __('Mot de passe oublié ?') }}
			</a>
			@endif
		</div>

	</form>
</section>
@endsection
