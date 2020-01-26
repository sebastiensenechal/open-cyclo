@extends('layouts.app')


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
<section class="base-page">

    <header>
        <h2>Création d'un utilisateur</h2>
    </header>

			{!! Form::open(['route' => 'user.store']) !!}
			<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
				{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nom', 'required']) !!}
				{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
				{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required']) !!}
				{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
				{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mot de passe'], 'required') !!}
				{!! $errors->first('password', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="form-group">
				{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmation mot de passe', 'required']) !!}
			</div>
			<div class="form-group">
				<div class="checkbox">
					<label>
						{!! Form::checkbox('admin', 1, null) !!} Administrateur
					</label>
				</div>
			</div>
			{!! Form::submit('Envoyer', ['class' => 'btn']) !!}
			{!! Form::close() !!}

</secton>

@endsection
