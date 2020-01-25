@extends('layouts.app')

@section('content')

		<section class="base-page">

				<header>
						<nav id="breadcrumb" aria-label="breadcrumb">
		            <ol class="breadcrumb">
		                <li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
		                <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de bord</a></li>
		                <li class="breadcrumb-item" aria-current="page">Liste des membres</li>
		            </ol>
		        </nav>

						<h2>Liste des membres</h2>
						<p>{!! link_to_route('user.create', 'Ajouter un utilisateur', []) !!}
						{!! $links !!}</p>
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
				  							<td class="text-primary"><strong>{!! $user->name !!}</strong></td>
				  							<td>{!! link_to_route('user.show', 'Voir', [$user->id], ['class' => 'btn']) !!}</td>
				  							<td>{!! link_to_route('user.edit', 'Modifier', [$user->id], ['class' => 'btn']) !!}</td>
				  							<td>
				  								{!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) !!}
				  									{!! Form::submit('Supprimer', ['onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
				  								{!! Form::close() !!}
				  							</td>
			  						</tr>
		  					@endforeach
	  	  		</tbody>
	  		</table>

	  </section>
@endsection
