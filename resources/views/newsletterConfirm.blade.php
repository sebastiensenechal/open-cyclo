@extends('layouts.template')

@section('titre')
Confirmation d'inscription
@endsection

@section('contenu')

<section class="content">
	<header id="header-content">
		<nav id="breadcrumb" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
				<li class="breadcrumb-item" aria-current="page">Confirmation</li>
			</ol>
		</nav>

		<h2>Confirmation</h2>
	</header>

	<p>Merci. Votre adresse a bien été prise en compte.</p>
</section>

@endsection
