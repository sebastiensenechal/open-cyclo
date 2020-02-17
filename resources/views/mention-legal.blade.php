@extends('layouts.template')

@section('titre')
	Mentions légales
@endsection

@section('sous-titre')
	<p>Pour un web responsable, sûr et respectueux des utilisateurs</p>
@endsection

@section('contenu')

	<section>
	   <article>
		   <header id="header-content">
			   <nav id="breadcrumb" aria-label="breadcrumb">
				   <ol class="breadcrumb">
					   <li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
					   <li class="breadcrumb-item" aria-current="page">Mentions légales</li>
				   </ol>
			   </nav>

			   <h2>Mentions légales</abbr></h2>
			   <p><strong>Le service Open cyclo est une création de Sébastien Sénéchal, dans le cadre d'une formation. Il n'est pas référencé et le restera pour le moment.<br />
			   Ce projet est suceptible de prendre de l'ampleur dans les mois à venir.</strong></p>

		   </header>

		   <h3>Maitrise d'oeuvre et maitre d'ouvrage</h3>
		   <p>Sébastien Sénéchal<br />
		   Site internet : <a href="https://sebastiensenechal.com/" title="Site de Sébastien Sénéchal" target="_blank">https://sebastiensenechal.com</a></p>

		   <h3>Hébergement OVH</h3>
			<address>
				Siège social<br />
				2 rue Kellermann<br />
				59100 Roubaix<br />
				France
			</address>
			<p><a href="www.ovh.com" title="Site d'OVH" target="_blank">www.ovh.com</a></p>

			<h3>Protection de vos données</h3>
			<p>Le site internet sebastiensenechal.com est conçu dans le respect des utilisateurs et de leurs données personnelles.<br />
			Pour en savoir plus sur la politique de protection des données, rendez-vous sur la page dédiée au RGPD.</p>

	   </article>
	</section>

@endsection
