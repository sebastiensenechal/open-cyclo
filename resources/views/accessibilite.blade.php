@extends('layouts.template')

@section('titre')
	Accessibilité
@endsection

@section('contenu')

	<section>
		<article>
			<header id="header-content">
				<nav id="breadcrumb" aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
						<li class="breadcrumb-item" aria-current="page">Accessibilité</li>
					</ol>
				</nav>

				<h2>Accessibilité et bonnes pratiques</h2>
				<p><strong>Cette page est une déclaration de conformité au référentiel Opquast et WCAG qui vise à définir le niveau d’accessibilité général constaté sur le site.<br />
				Pour des aides relatives à la navigation et aux aménagements particuliers du site, visitez la page d’aide.</strong></p>
			</header>

			<p>La déclaration de conformité de OpenCyclo a été établie le jj/mm/aaaa.</p>
			<p>La version du référentiel Opquast utilisé est la version 2019.</p>

			<h3>Identité du déclarant</h3>
			<p>OpenCyclo</p>

			<h3>Technologies utilisées</h3>
			<ul>
			    <li>HTML5</li>
			    <li>CSS3</li>
				<li>JSON</li>
			    <li>JavaScript</li>
			    <li>PHP 7.2</li>
				<li>Laravel 6</li>
				<li>Leaflet</li>
				<li>Open Street Map</li>
				<li>Géolocalisation : Locate Control</li>
				<li>SwiftMailer</li>
			</ul>

		</article>
	</section>

@endsection
