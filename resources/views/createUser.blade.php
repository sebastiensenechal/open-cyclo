@extends('layouts.app')

@section('title', __('Ajouter un utilisateur'))

@section('header')
	<nav id="breadcrumb" aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
			<li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de bord</a></li>
			<li class="breadcrumb-item"><a href="{{ url('user') }}">Liste des membres</a></li>
			<li class="breadcrumb-item" aria-current="page">Ajouter</li>
		</ol>
	</nav>
@endsection


@section('content')

	<section class="base-page duo">
		<article>
			<header>
				<h2>Création d'un utilisateur</h2>
			</header>

			{{ Form::open(['route' => 'user.store', 'class' => 'form-column']) }}
			@csrf

				{{ Form::text('name', null, ['placeholder' => 'Nom', 'required']) }}
				{!! $errors->first('name', '<small class="help-block">:message</small>') !!}


				{{ Form::email('email', null, ['placeholder' => 'Email', 'required']) }}
				{!! $errors->first('email', '<small class="help-block">:message</small>') !!}

				{{ Form::password('password', ['placeholder' => 'Mot de passe'], 'required') }}
				{!! $errors->first('password', '<small class="help-block">:message</small>') !!}

				{{ Form::password('password_confirmation', ['placeholder' => 'Confirmation mot de passe', 'required']) }}

				<div class="checkbox">
					<label>
						{{ Form::checkbox('admin', 1, null) }} Administrateur
					</label>
				</div>

			{{ Form::submit('Envoyer'), ['class' => 'btn'] }}
			{{ Form::close() }}
		</article>
	</secton>

@endsection
