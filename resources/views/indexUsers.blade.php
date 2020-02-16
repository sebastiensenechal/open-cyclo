@extends('layouts.app')


@section('header')
<nav id="breadcrumb" aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de bord</a></li>
		<li class="breadcrumb-item" aria-current="page">Liste des membres</li>
	</ol>
</nav>
@endsection


@section('content')
<section class="base-page">

	<header>
		<h2>Liste des membres</h2>
		@if(Auth::check() and Auth::user()->admin)
			@can('create', new App\User)
			<p><a href="{{ route('user.create') }}">Ajouter un utilisateur</a></p>
			@endcan
		@endif
	</header>

	@if(session()->has('ok'))
	<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
	@endif

	@if(session()->has('info'))
	<div class="notification is-success">
		{{ session('info') }}
	</div>
	@endif

	<table class="table">
		<thead>
			<tr>
				<th>Nom</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
			<tr>
				<td><strong>{!! $user->name !!}</strong>
					@if($user->admin == 1)
					(<span>Admin</span>)
					@endif
				</td>
				<td>{!! link_to_route('user.show', 'Voir', [$user->id], ['class' => 'btn']) !!}</td>
				<td>{!! link_to_route('user.edit', 'Modifier', [$user->id], ['class' => 'btn']) !!}</td>
				<td>
					{!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) !!}
					{!! Form::submit('Supprimer', ['class' => 'btn', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	{{ $users->links() }}

</section>
@endsection
