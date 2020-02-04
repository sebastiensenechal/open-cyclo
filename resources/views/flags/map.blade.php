@extends('layouts.home')

@section('nav')
	<h1 id="title-home">Opencyclo</h1>
	<nav id="nav">
		<ul class="navbar-nav ml-auto">
			<li class="deroulant"><span class="label_menu">Menu</span>
				<ul class="sous">
					<li><a class="active" href="{{ route('map') }}" title="Carte"><span class="material-icons">map</span> Carte</a></li>
					<li><a href="{{ url('posts') }}" title="Rester informé"><span class="material-icons">info</span> Infos cyclo</a></li>
					<li><a href="aide" title="Demander de l'aider"><span class="material-icons">help_outline</span> Aide</a></li>
					<li><a href="{{ url('contact') }}" title="Nous contacter"><span class="material-icons">mail_outline</span> Contact</a></li>
				</ul>
			</li>
		</ul>
	</nav>
@endsection

@section('content')
	<section id="intro">
		<article>
			<header>
				<h2>Le guide tous terrains des cyclistes et des curieux.</h2>
			</header>
			<ul>
				<li>Localisez votre position,</li>
				<li>Repérez les pistes cyclables,</li>
				<li>Informez-vous sur l'état des pistes,</li>
				<li>Contribuez.</li>
			</ul>
			<p>Le service est entièrement <strong>gratuit</strong>.<br />
			Pour contribuez <a href="{{ route('register') }}">inscrivez-vous</a>.</p>
		</article>
	</section>

	<div id="mapid"></div>

@endsection

@section('footer')
	<nav id="toolbar">
		<ul>
			<li><a href="{{ url('contact') }}" title="Nous contacter"><span class="material-icons">mail_outline</span></a></li>
			<li><a href="aide" title="Trouver de l'aide"><span class="material-icons">help_outline</span></a></li>
			<li><a href="contribute" title="Profil"><span class="material-icons">person</span></a></li>
		</ul>
	</nav>
@endsection

@section('styles')
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
	integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
	crossorigin=""/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />
@endsection

@push('scripts')
	<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
	integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
	crossorigin=""></script>
	<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js"></script>

	{{ Html::script('js/Maps.js') }}

	<script>
		Maps.initMap();
		Maps.geoJson(); // Display markers on map
		@can('create', new App\Flag) // Authorization for addMarker
			Maps.addMarker();
		@endcan
	</script>
@endpush
