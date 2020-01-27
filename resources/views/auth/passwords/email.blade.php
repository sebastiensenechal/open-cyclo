@extends('layouts.app')

@section('content')

<section class="form-center">

	<h2>{{ __('Demander un nouveau mot de passe') }}</h2>

	@if (session('status'))
	<div class="alert alert-success" role="alert">
		{{ session('status') }}
	</div>
	@endif

	<form method="POST" action="{{ route('password.email') }}">
		@csrf

		<label for="email">{{ __('E-Mail Address') }}</label>
		<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
		@error('email')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		@enderror

		<button type="submit" class="btn">
			{{ __('Soumettre') }}
		</button>

	</form>

</section>
@endsection
