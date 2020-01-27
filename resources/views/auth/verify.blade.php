@extends('layouts.app')

@section('content')
<section class="form-center">
	<h2>{{ __('Vérifiez votre adresse email') }}</h2>

	@if (session('resent'))
	<div class="alert alert-success" role="alert">
		{{ __('Un nouveau lien de vérification va vous être envoyé.') }}
	</div>
	@endif

	{{ __('Merci de vérifier vos mails pour confirmer votre inscription.') }}
	{{ __('Pour renvoyer un mail de confirmation :') }},
	<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
		@csrf
		<button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('cliquez pour renvoyer le mail') }}</button>.
	</form>

</section>
@endsection
