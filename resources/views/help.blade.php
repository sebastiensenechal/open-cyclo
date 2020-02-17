@extends('layouts.template')

@section('titre')
	Besoin d'aide ?
@endsection

@section('sous-titre')
	<p>&laquo;&nbsp;Il est plus facile de professer en paroles un humanisme de bon aloi, que de rendre service à son voisin&nbsp;&raquo; - Henri Laborit</p>
@endsection


@section('contenu')

	<section>
		<article>
			<header id="header-content">
				<nav id="breadcrumb" aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
						<li class="breadcrumb-item" aria-current="page">Aide</li>
					</ol>
				</nav>

				<h2><abbr title="Foire aux questions">FAQ</abbr></h2>
				<p>Vous assister en toutes circonstances. Si vous vous posez des questions, il y a des chances pour que vous trouviez une réponse ici même.<br />
				Si ce n'est pas le cas, contactez-nous via notre formulaire et nous répondrons dans les plus brefs délais.</p>
			</header>

			<h3>Qu'est-ce que Open cyclo&nbsp;?</h3>
			<p>Open cyclo est un service en ligne dédié aux cyclistes, qu'ils ou elles soient occasionnels ou expérimentés. Ce service propose une cartographique donnant une image clair des pistes cyclables, avec géolocalisation et ajout/affichage de signalements.</p>
			<p>Malgré l’augmentation des pistes cyclables, de nombreux cyclistes se trouvent en difficulté sur des pistes mal conçues ou dégradées.<br />
			Un affichage clair des travaux et des perturbations peut grandement faciliter la circulation.</p>
			<p>C'est enfin un outil de pédagogie et d'information.</p>

			<h3>Comment fonctionne notre service&nbsp;?</h3>
			<p>Pourquoi gratuit ? Notre service est open source, de plus vous ne trouverez aucune publicité. Open cyclo, c'est avant tout des passionnés et des gens un peu fou.</p>

			<h3>Comment ajouter un signalement sur la carte&nbsp;?</h3>
			<p>C'est très simple, pour ajouter un signalement vous devez être connecté. Pour cela, inscrivez-vous gratuitement avec votre pseudo et une adresse email, c'est tout !</p>
			<p>Une fois inscrit, vous êtes libre de contribuer et d'enrichir la carte Open cyclo.</p>

		</article>
	</section>

@endsection
