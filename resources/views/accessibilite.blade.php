@extends('layouts.template')

@section('titre')
	Accessibilité
@endsection

@section('sous-titre')

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
			</header>


			</article>
		</section>

@endsection
