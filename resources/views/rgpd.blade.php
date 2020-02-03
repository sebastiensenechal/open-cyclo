@extends('layouts.template')

@section('titre')
	Données personnelles<br />(RGPD)
@endsection

@section('sous-titre')
	<p>Votre vie privée ainsi que vos données personnelles vous appartiennent. Elles possèdent un caractère sacré qui doit être respecté.</p>
@endsection

@section('contenu')

	<section>
		<article>
			<header id="header-content">
				<nav id="breadcrumb" aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
						<li class="breadcrumb-item" aria-current="page">RGPD</li>
					</ol>
				</nav>

				<h2>Réglement général pour la protection des données <abbr title="Réglement général pour la protection des données">RGPD</abbr></h2>
				<p>Vos données peuvent faire l’objet d’un traitement, notamment dans le cadre du suivi de fréquentation.
				Lorsque certaines informations sont obligatoires pour accéder à des fonctionnalités spécifiques, ce caractère obligatoire est indiqué au moment de la collecte de la saisie des données.
				Je ne collecte que le strict minimum et les adresses IP sont cryptées et anonymisées par Google Analytics.</p>
			</header>

			<h3>Données enregistrées</h3>
			<p>Des données à caractère personnel sont susceptibles d’être collectées.</p>


			</article>
		</section>

@endsection
