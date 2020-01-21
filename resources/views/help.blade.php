@extends('layouts.template')

@section('titre')
		Besoin d'aide ?
@endsection

@section('sous-titre')
		<p>&laquo;&nbsp;Il est plus facile de professer en paroles un humanisme de bon aloi, que de rendre service à son voisin&nbsp;&raquo; - Henri Laborit</p>
@endsection


@section('contenu')

		<section>
			<header id="header-content">
				<nav id="breadcrumb" aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
								<li class="breadcrumb-item" aria-current="page">Aide</li>
						</ol>
				</nav>

				<h2><abbr title="Foire aux questions">FAQ</abbr></h2>
				<p>Vous assister en toutes circonstances. Si vous vous posez des questions, il y a des chances pour que vous trouviez une réponse ici même.</p>
				<p>Si ce n'est pas le cas, contactez-nous via notre formulaire et nous répondrons dans les plus brefs délais.</p>
			</header>


		</section>

@endsection
