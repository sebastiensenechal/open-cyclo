@extends('layouts.app')

@section('title', __('Détails'))


@section('header')
<nav id="breadcrumb" aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de bord</a></li>
		<li class="breadcrumb-item"><a href="{{ url('flags') }}">Liste des signalements</a></li>
		<li class="breadcrumb-item" aria-current="page">Détails</li>
	</ol>
</nav>
@endsection


@section('content')
<section class="base-page duo">
	<article>
		<header>
			<h2>Détails</h2>
		</header>

		<table class="table table-sm">
			<tbody>
				<tr><td class="text-primary">{{ __('Type d\'incident') }}</td><td>{{ $flag->name }}</td></tr>
				<tr><td class="text-primary">{{ __('Latitude') }}</td><td>{{ $flag->latitude }}</td></tr>
				<tr><td class="text-primary">{{ __('Longitude') }}</td><td>{{ $flag->longitude }}</td></tr>
			</tbody>
		</table>

		<ul class="list-btn">
			@if(Auth::check() and Auth::user()->admin)
			<li><a href="{{ route('flags.edit', $flag) }}" id="edit-flag-{{ $flag->id }}" class="btn">{{ __('Modifier') }}</a></li>
			<li><a href="{{ route('flags.index') }}" class="btn">{{ __('Liste') }}</a></li>
			@endif
			<li><a href="{{ route('map') }}" class="btn">{{ __('Carte') }}</a></li>
		</ul>
	</article>

	<aside>
		@if ($flag->coordinate)
		<div id="mapid"></div>
		@else
		<div>{{ __('flag.no_coordinate') }}</div>
		@endif
	</aside>
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
{{ Html::script('js/MapsShow.js') }}
<script>
	MapsShow.initMap([{{ $flag->latitude }}, {{ $flag->longitude }}]);
</script>
@endpush
