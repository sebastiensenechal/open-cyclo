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


				{!! Form::open(['route' => 'posts.store', 'class' => 'form-horizontal panel']) !!}
						@csrf
						<div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!}">
							{!! Form::text('titre', null, ['class' => 'form-control', 'placeholder' => 'Titre', 'required']) !!}
							{!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
						</div>
						<div class="form-group {!! $errors->has('excerpt') ? 'has-error' : '' !!}">
							{!! Form::text('excerpt', null, ['class' => 'form-control', 'placeholder' => 'Extrait', 'required']) !!}
							{!! $errors->first('excerpt', '<small class="help-block">:message</small>') !!}
						</div>
						<div class="form-group {!! $errors->has('contenu') ? 'has-error' : '' !!}">
							{!! Form::label('contenu', 'Article', array('class' => 'hidden')); !!}
							{!! Form::textarea ('contenu', null, ['class' => 'form-control', 'required']) !!}
							{!! $errors->first('contenu', '<small class="help-block">:message</small>') !!}
						</div>
				{!! Form::submit('Envoyer', ['class' => 'btn btn-primary']) !!}
				{!! Form::close() !!}

		</section>
@endsection
