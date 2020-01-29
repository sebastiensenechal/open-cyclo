@extends('layouts.app')


@section('header')
<nav id="breadcrumb" aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de bord</a></li>
		<li class="breadcrumb-item"><a href="{{ url('user') }}">Liste des membres</a></li>
		<li class="breadcrumb-item" aria-current="page">Modifier</li>
	</ol>
</nav>
@endsection


@section('content')
<section class="base-page">

	<header>
		<h2>Modifier le profil</h2>
	</header>

	{{ Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put']) }}
	<div class="{!! $errors->has('name') ? 'has-error' : '' !!}">
		{{ Form::text('name', null, ['placeholder' => 'Nom', 'required']) }}
		{!! $errors->first('name', '<small>:message</small>') !!}
	</div>
	<div class="{!! $errors->has('email') ? 'has-error' : '' !!}">
		{{ Form::email('email', null, ['placeholder' => 'Email', 'required']) }}
		{!! $errors->first('email', '<small>:message</small>') !!}
	</div>
	@if (Auth::user()->admin === 1)

	<div class="checkbox">
		<label>
			{{ Form::checkbox('admin', 1, null) }} Administrateur
		</label>
	</div>

	@endif
	{{ Form::submit('Envoyer', ['class' => 'btn']) }}
	{{ Form::close() }}

	<p><a href="javascript:history.back()">Annuler</a></p>

</section>

@endsection
