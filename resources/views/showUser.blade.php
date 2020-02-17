@extends('layouts.app')


@section('header')
	<nav id="breadcrumb" aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
			<li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de bord</a></li>
			<li class="breadcrumb-item"><a href="{{ url('user') }}">Liste des membres</a></li>
			<li class="breadcrumb-item" aria-current="page">{{ $user->name }}</li>
		</ol>
	</nav>
@endsection


@section('content')
	<section class="base-page">

		<header>
			<h2>Profil de {{ $user->name }}</h2>
		</header>

		<p>Nom : {{ $user->name }}</p>
		<p>Email : {{ $user->email }}</p>
		@if($user->admin == 1)
			<p>Rôle : Administrateur</p>
		@endif

		<p><a href="javascript:history.back()" class="btn">Retour</a></p>

	</section>
@endsection
