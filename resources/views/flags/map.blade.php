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
    <!-- <div id ="status"></div> -->
    <section id="intro">
      <h2>Le guide tous terrains des cyclistes et des curieux.</h2>
      <ul>
        <li>Localisez votre position,</li>
        <li>Repérez les pistes cyclables,</li>
        <li>Informez-vous sur l'état des pistes,</li>
        <li>Contribuez.</li>
      </ul>
      <p>Le service est entièrement <strong>gratuit</strong>.<br />
      Pour contribuez <a href="{{ route('register') }}">inscrivez-vous</a>.</p>

    </section>

    <!-- <div class="smart-popin" id="popin1">
    	  <div class="sp-table">
    		    <div class="sp-cell">

    			      <div class="sp-body">
    				        <h2>Contribuer</h2>
    				        <a href="#" class="sp-close">×</a>
                    <p><a href="{{ route('flags.create') }}?Map.latitude=' + latitude + '&Map.longitude=' + longitude + '">Ajouter un signalement</a><p>
    			      </div>

    			      <a href="#" class="sp-back"></a>

    		    </div>
    	  </div>
    </div> -->

    <div id="mapid"></div>
    <!-- <example-component></example-component> -->
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
<!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js"></script>

{{ Html::script('js/Maps.js') }}
<!-- {{ Html::script('../public/js/Load.js') }} -->

<script>
Maps.initMap();
Maps.geoJson();

// *****************************
//      Add marker to click
// *****************************
@can('create', new App\Flag)
var theMarker;
map.on('click', function(e) {
    let latitude = e.latlng.lat.toString().substring(0, 15);
    let longitude = e.latlng.lng.toString().substring(0, 15);
    if (theMarker != undefined) {
        map.removeLayer(theMarker);
    };
    var popupContent = '<a href="{{ route('flags.create') }}?latitude=' + latitude + '&longitude=' + longitude + '">Ajouter un signalement</a>';
    // "Your location : " + latitude + ", " + longitude + "."
    theMarker = L.marker([latitude, longitude]).addTo(map);
    theMarker.bindPopup(popupContent)
    .openPopup();
});
@endcan
</script>
@endpush
