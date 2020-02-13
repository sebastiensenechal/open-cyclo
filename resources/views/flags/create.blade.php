@extends('layouts.app')

@section('title', __('Ajouter un signalement'))

@section('header')
	<nav id="breadcrumb" aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
			<li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de bord</a></li>
			<li class="breadcrumb-item"><a href="{{ url('flags') }}">Liste des signalements</a></li>
			<li class="breadcrumb-item" aria-current="page">Ajouter</li>
		</ol>
	</nav>
@endsection

@section('content')
	<section class="base-page duo">
		<article>
			<header>
				<h2>Ajouter un signalement</h2>
			</header>

			<form class="form-column" method="POST" action="{{ route('flags.store') }}" accept-charset="UTF-8">
				{{ csrf_field() }}

				<label for="name" class="control-label text-primary">{{ __('Type d\'incident') }}</label>
				<select id="name" class="{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required>
					<option selected value="Travaux">Travaux</option>
					<option value="Voie endommagée">Voie endommagée</option>
					<option value="Autre perturbation">Autre perturbation</option>
				</select>
				{!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}


				<label for="latitude" class="control-label text-primary">{{ __('Latitude') }}</label>
				<input id="latitude" type="text" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" name="latitude" value="{{ old('latitude', request('latitude')) }}" placeholder="Latitude..." required>
				{!! $errors->first('latitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}


				<label for="longitude" class="control-label text-primary">{{ __('Longitude') }}</label>
				<input id="longitude" type="text" class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}" name="longitude" value="{{ old('longitude', request('longitude')) }}" placeholder="Longitude..." required>
				{!! $errors->first('longitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}


				<div id="mapid"></div>

				<div class="list-btn">
					<input type="submit" value="{{ __('Ajouter') }}" class="btn btn-success">
					@if(Auth::check() and Auth::user()->admin)
					<a href="{{ route('flags.index') }}" class="btn btn-link">{{ __('Annuler') }}</a>
					@else
					<a href="{{ route('map') }}" class="btn btn-link">{{ __('Annuler') }}</a>
					@endif
				</div>
			</form>

		</article>

	</section>
@endsection

@section('styles')
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
	integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
	crossorigin=""/>
@endsection

@push('scripts')
	<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
	integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
	crossorigin=""></script>

	{{ Html::script('js/MapsCreate.js') }}

	<script>
		MapsCreate.initMap();
	</script>
@endpush
