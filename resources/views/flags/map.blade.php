@extends('layouts.home')

@section('nav')
<h1 id="title-home">Opencyclo</h1>
    <nav id="nav">
        <ul class="navbar-nav ml-auto">
            <li class="deroulant"><span class="label_menu">Menu</span>
                <ul class="sous">
                    <li><a class="active" href="{{ route('map') }}" title="Carte"><i class="material-icons">map</i> <span>Carte</span></a></li>
                    <li><a href="{{ url('posts') }}" title="Rester informé"><i class="material-icons">info</i> <span> Infos cyclo</a></li>
                    <li><a href="aide" title="Demander de l'aider"><i class="material-icons">help_outline</i> <span>Aide</span></a></li>
                    <li><a href="{{ url('contact') }}" title="Nous contacter"><i class="material-icons">mail_outline</i> <span>Contact</span></a></li>
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
        <li>Utilisez cette carte pour vous géolocalisez,</li>
        <li>Repérez les pistes cyclables que vous souhaitez,</li>
        <li>Informez-vous sur l'état des pistes et contribuez.</li>
      </ul>
      <p>Le service est entièrement <strong>gratuit</strong>, pour contribuez <a href="{{ route('register') }}">inscrivez-vous</a>.</p>

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

    <div id="mapid">
        <!-- Cartographie -->
    </div>
@endsection

@section('footer')
    <nav id="toolbar">
      <ul>
        <!-- <li id="find-me"><i class="material-icons">location_searching</i></li> -->
        <!-- <li><a href="#popin1" class="open-popin"><i class="material-icons">comment</i></a></li> -->
        <li><a href="{{ url('contact') }}" title="Nous contacter"><i class="material-icons">mail_outline</i></a></li>
        <li><a href="aide" title="Trouver de l'aide"><i class="material-icons">help_outline</i></a></li>
        <li><a href="contribute" title="Profil"><i class="material-icons">person</i></a></li>
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
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>

{{ Html::script('js/Maps.js') }}
<!-- {{ Html::script('../public/js/Load.js') }} -->

<script>
Maps.initMap();
Maps.geoJson();
    // *****************************
    //      Map initialisation
    // *****************************
    // var map = L.map('mapid').setView([{{ config('leaflet.map_center_latitude') }}, {{ config('leaflet.map_center_longitude') }}], {{ config('leaflet.zoom_level') }});
    // var map = L.map('mapid').locate({setView: true, maxZoom: 16});
    // var baseUrl = "{{ url('/') }}";
    // L.tileLayer('https://tile.thunderforest.com/cycle/{z}/{x}/{y}.png?apikey=2ee1c74c95c54dd7b150e8f4604e7865', {
    //     attribution: 'Maps © <a href="http://www.thunderforest.com/" target="_blank">Thunderforest</a>, Data © <a href="http://www.openstreetmap.org/copyright" target="_blank">OpenStreetMap contributors.</a>'
    // }).addTo(map);


    // ***********************
    //      User location
    // ***********************
    // function onLocationFound(e) {
    //     var radius = e.accuracy;
    //     let latitude = e.latlng.lat.toString().substring(0, 15);
    //     let longitude = e.latlng.lng.toString().substring(0, 15);
    //     L.marker(e.latlng).addTo(map)
    //         .bindPopup('<br><a href="{{ route('flags.create') }}?latitude=' + latitude + '&longitude=' + longitude + '">Ajouter un signalement</a>');
    //
    //     // L.circle(e.latlng, radius).addTo(map);
    // }
    // map.on('locationfound', onLocationFound);
    //
    // function onLocationError(e) {
    //     alert(e.message);
    // }
    // map.on('locationerror', onLocationError);


    // // *************************
    // //      Find Me button
    // // *************************
    // function geoFindMe() {
    //   const status = document.querySelector('#status');
    //
    //   function success() {
    //     status.textContent = '';
    //     document.getElementById("status").style.display = "none";
    //
    //     map.locate({setView: true, maxZoom: 16});
    //     L.marker(e.latlng).addTo(map)
    //         .bindPopup('<a href="{{ route('flags.create') }}?latitude=' + latitude + '&longitude=' + longitude + '">Ajouter un signalement</a>');
    //   }
    //
    //   function error() {
    //     status.textContent = 'Impossible de vous localiser';
    //   }
    //
    //   var geo_options = {
    //     enableHighAccuracy: true,
    //     maximumAge        : 30000,
    //     timeout           : 27000
    //   }
    //
    //   if (!navigator.geolocation) {
    //     status.textContent = 'Geolocation n\'est pas supporté sur votre navigateur';
    //   } else {
    //     document.getElementById("status").style.display = "block";
    //
    //     status.textContent = 'Recherche en cours...';
    //
    //     // navigator.geolocation.getCurrentPosition(success, error);
    //     navigator.geolocation.watchPosition(success, error, geo_options);
    //   }
    // }
    //
    // document.querySelector('#find-me').addEventListener('click', geoFindMe());


    // *************************
    //      API Flags call
    // *************************
    // axios.get('api/flags') // {{ route('api.flags.index') }}
    // .then(function (response) {
    //     console.log(response.data);
    //     L.geoJSON(response.data, {
    //         pointToLayer: function(geoJsonPoint, latlng) {
    //             return L.marker(latlng);
    //         }
    //     })
    //     .bindPopup(function (layer) {
    //         return layer.feature.properties.map_popup_content;
    //     }).addTo(map);
    // })
    // .catch(function (error) {
    //     console.log(error);
    // });



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
