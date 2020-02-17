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
				<p><strong>Vos données peuvent faire l’objet d’un traitement, notamment dans le cadre du suivi de fréquentation.
				Lorsque certaines informations sont obligatoires pour accéder à des fonctionnalités spécifiques, ce caractère obligatoire est indiqué au moment de la collecte de la saisie des données.
				Je ne collecte que le strict minimum et les adresses IP sont cryptées et anonymisées par Google Analytics.</strong></p>
			</header>

			<h3>Données enregistrées</h3>
			<p>Des données à caractère personnel sont susceptibles d’être collectées par Open Cyclo.</p>
			<ul>
				<li>Nom</li>
				<li>Prénom</li>
				<li>Adresse email</li>
			</ul>

			<p>Dans le cadre :</p>
			<ul>
				<li>D'un formulaire de contact</li>
				<li>D'une inscription sur le site Open cyclo</li>
				<li>D'une inscription à notre lettre d'information</li>
			</uL>

			<h3>Durée de conservation des données</h3>
			<p>Vos données ne sont conservées qu'au strict minimum.<br />
			En cas d'inactivité, les données sont supprimées au bout d'un an, dans le cadre du droit à l'oublie.</p>

			<h3>Droit des personnes</h3>
			<p>Conformément aux dispositions légales et règlementaires applicables, en particulier la loi n° 78-17 du 6 janvier modifiée relative à l’informatique, aux fichiers et aux libertés et le règlement européen n° 2016/679/UE du 27 avril 2016 (applicable depuis le 25 mai 2018), vous disposez des droits suivants :</p>
			<ul>
				<li>Exercer votre droit d’accès, pour connaître les données personnelles qui vous concernent ;</li>
			    <li>Demander la mise à jour de vos données, si elles sont inexactes ;</li>
			    <li>Demander la portabilité ou la suppression de vos données ;</li>
			    <li>Vous opposer, pour des motifs légitimes, au traitement de vos données ;</li>
			    <li>Retirer votre consentement au traitement de vos données.</li>
			</ul>

			<h3>Pour exercer ces droits</h3>
			<p>Contactez-nous directement sur notre formulaire de contact</p>

			<h3>Réclamation</h3>
			<p>Si vous estimez, après nous avoir contactés, que vos droits Informatique et Libertés ne sont pas respectés, vous avez la possibilité d’introduire une réclamation auprès de la CNIL.</p>
		</article>
	</section>

@endsection
