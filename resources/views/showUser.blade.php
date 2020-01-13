@extends('layouts.app')

@section('content')

<section id="content">
  <header id="header-content">
    <h2>Fiche membre</h2>
  </header>

			<div class="panel-body">
				<p>Nom : {{ $user->name }}</p>
				<p>Email : {{ $user->email }}</p>
				@if($user->admin == 1)
					Administrateur
				@endif
			</div>

		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>


@endsection
