@extends('layouts.app')

@section('content')
	<section>

		@if (session('status'))
			<div class="alert alert-success" role="alert">
				{{ session('status') }}
			</div>
		@endif

		@if(session()->has('info'))
			<div class="notification is-success">
				{{ session('info') }}
			</div>
		@endif

		@if(session()->has('ok'))
			<div class="notification is-success">{!! session('ok') !!}</div>
		@endif

		<article>
			<header>
				<h2>{{ Auth::user()->name }} (<span>{!! link_to_route('user.edit', 'Modifier', [Auth::user()->id]) !!}</span>)</h2>
			</header>

			<p>Email : {{ Auth::user()->email }}<br />
				Rôle :
				@if (Auth::user()->admin === 1)
					Administrateur
				@else
					Abonné(e)
				@endif
			</p>
		</article>

		<article>
			<header>
				<h2>Carte</h2>
				<p>Gestion des signalements des abonné(e)s. Modification, suppression...</p>
			</header>

			<ul class="list-btn">
				<li>
					<a href="{{ route('flags.index') }}" class="btn">Tous les signalements</a>
				</li>
				<li>
					<a href="{{ route('flags.create') }}" class="btn">{{ __('Ajouter') }}</a>
				</li>
			</ul>
		</article>


		<article>
			<header>
				<h2>Articles</h2>
				<p>Ici vous pouvez créer, modifier, supprimer les articles du site Opencyclo.</p>
			</header>

			<ul class="list-btn">
				<li><a href="posts" class="btn">Tous les articles</a></li>
				<li><a href="{{ route('posts.create') }}" title="Formulaire d'ajout d'article" class="btn">Ajouter</a></li>
			</ul>
		</article>


		<article>
			<header>
				<h2>Membres</h2>
				<p>Gestion des abonnés et des rôles. Listing, modification, création, suppression...</p>
			</header>

			<ul class="list-btn">
				<li><a href="user" class="btn">Tous les utilisateurs</a></li>
				<li><a href="{{ route('user.create') }}" class="btn">{{ __('Ajouter') }}</a></li>
			</ul>
		</article>

	</section>
@endsection
