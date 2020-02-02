@extends('layouts.template')

@section('titre')
	Modifier un article
@endsection

@section('contenu')
<section id="posts-list">
	<header id="header-content">
		<nav id="breadcrumb" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
				<li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Infos cyclo</a></li>
				<li class="breadcrumb-item" aria-current="page">Modifier un article</li>
			</ol>
		</nav>

		<h2>Modifiez les champs ci-dessous</h2>
	</header>


	<form action="{{ route('posts.update', $post->id) }}" method="POST">
		@csrf
		@method('put')

		<label class="label">Titre</label>
		<input class="input @error('titre') is-danger @enderror" type="text" name="titre" value="{{ old('titre', $post->titre) }}" placeholder="Titre de l'article">
		@error('titre')
		<p class="help is-danger">{{ $message }}</p>
		@enderror


		<label class="label">Extrait</label>
		<textarea class="textarea" name="excerpt" placeholder="Extrait" required>{{ old('excerpt', $post->excerpt) }}</textarea>
		@error('excerpt')
		<p class="help is-danger">{{ $message }}</p>
		@enderror


		<label class="label">Article</label>
		<textarea class="textarea" id="tiny" name="contenu" rows="25" placeholder="Article" required>{{ old('contenu', $post->contenu) }}</textarea>
		@error('contenu')
		<p class="help is-danger">{{ $message }}</p>
		@enderror


		{!! Form::submit('Envoyer !') !!}
	</form>

</section>
@endsection

@push('scripts')
	{{ Html::script('js/script.js') }}
@endpush
