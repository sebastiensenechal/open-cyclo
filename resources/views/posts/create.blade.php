@extends('layouts.template')

@section('titre')
Ajouter un article
@endsection

@section('contenu')
<section id="posts-list">
	<header id="header-content">
		<nav id="breadcrumb" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
				<li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Infos cyclo</a></li>
				<li class="breadcrumb-item" aria-current="page">Ajouter un article</li>
			</ol>
		</nav>

		<h2>Création d'un article</h2>
	</header>


	{{ Form::open(['route' => 'posts.store', 'id' => 'content']) }}
	@csrf

		{{ Form::text('titre', null, ['placeholder' => 'Titre', 'required']) }}
		{!! $errors->first('titre', '<small class="help-block">:message</small>') !!}


		{{ Form::text('excerpt', null, ['placeholder' => 'Extrait', 'required']) }}
		{!! $errors->first('excerpt', '<small class="help-block">:message</small>') !!}


		{!! Form::label('contenu', 'Article', array('class' => 'hidden')); !!}
		{!! Form::textarea ('contenu', 'Votre article...', ['required']) !!}
		{!! $errors->first('contenu', '<small class="help-block">:message</small>') !!}

	{{ Form::submit('Envoyer') }}
	{{ Form::close() }}

</section>
@endsection


@push('scripts')
{{ Html::script('js/script.js') }}
@endpush
