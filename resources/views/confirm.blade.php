@extends('layouts.template')

@section('titre')
		Merci
@endsection

@section('sous-titre')
		<p>&nbsp;&laquo;La seule voie qui offre quelque espoir d'un avenir meilleur pour toute l'humanité est celle de la coopération et du partenariat.&nbsp;&raquo; - Kofi Annan</p>
@endsection

@section('contenu')

	<section class="content">
			<header id="header-content">
					<nav id="breadcrumb" aria-label="breadcrumb">
							<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
									<li class="breadcrumb-item" aria-current="page">Confirmation de reception</li>
							</ol>
					</nav>

					<h2>Nous avons bien reçu votre message</h2>
			</header>

			<p>Nos équipes vous répondrons dans les plus brefs délais.</p>
			<p>Retour à la <a class="active" href="{{ route('map') }}">carte</a>.</p>
	</section>

@endsection
