@extends('layouts.home')

@section('nav')
<h1 id="title-home">Opencyclo</h1>
    <nav id="nav">
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <li><a class="active" href="{{ route('map') }}" title="Carte"><i class="material-icons">map</i> <span>Carte</span></a></li>
            <li><a href="{{ url('posts') }}" title="Rester informé"><i class="material-icons">info</i> <span> Infos cyclo</a></li>
            <li><a href="aide" title="Demander de l'aider"><i class="material-icons">help_outline</i> <span>Aide</span></a></li>
            <li><a href="{{ url('contact') }}"><i class="material-icons">mail_outline</i> <span>Contact</span></a></li>
            <!-- Authentication Links -->
            @guest
            <!-- <li class="deroulant">
              <span>Menu</span>
                <ul class="sous"> -->
                    <!-- <li class="nav-item"><a class="nav-link" href="{{ route('flag_map.index') }}">{{ __('menu.our_flags') }}</a></li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Abonnement') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Déconnection') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                <!-- </ul>
            </li> -->
            @endguest
        </ul>
    </nav>
@endsection

@section('content')
    <div id ="status"></div>

    <div class="smart-popin" id="popin1">
    	  <div class="sp-table">
    		    <div class="sp-cell">

    			      <div class="sp-body">
    				        <h2>Contribuer</h2>
    				        <a href="#" class="sp-close">×</a>
                    <p><a href="{{ route('flags.create') }}?latitude=' + latitude + '&longitude=' + longitude + '">Ajouter un signalement</a><p>
    			      </div>

    			      <a href="#" class="sp-back"></a>

    		    </div>
    	  </div>
    </div>

    <div id="mapid">
        <!-- Cartographie -->
    </div>
@endsection

@section('footer')
    <nav id="toolbar">
      <ul>
        <li id="find-me"><i class="material-icons">location_searching</i></li>
        <li><a href="#popin1" class="open-popin"><i class="material-icons">comment</i></a></li>
        <li><a href="aide"><i class="material-icons">help_outline</i></a></li>
        <li><a href="contribute"><i class="material-icons">person</i></a></li>
      </ul>
    </nav>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>
@endsection
@push('scripts')
<!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script>

<!-- {{ Html::script('../public/js/Load.js') }}
{{ Html::script('../public/js/Load.js') }} -->

<script>

    // *****************************
    //      Map initialisation
    // *****************************
    //var map = L.map('mapid').setView([{{ config('leaflet.map_center_latitude') }}, {{ config('leaflet.map_center_longitude') }}], {{ config('leaflet.zoom_level') }});
    var map = L.map('mapid').locate({setView: true, maxZoom: 16});
    var baseUrl = "{{ url('/') }}";
    L.tileLayer('https://tile.thunderforest.com/cycle/{z}/{x}/{y}.png?apikey=2ee1c74c95c54dd7b150e8f4604e7865', {
        attribution: 'Maps © <a href="http://www.thunderforest.com/" target="_blank">Thunderforest</a>, Data © <a href="http://www.openstreetmap.org/copyright" target="_blank">OpenStreetMap contributors.</a>'
    }).addTo(map);


    // ***********************
    //      User location
    // ***********************
    function onLocationFound(e) {
        var radius = e.accuracy;
        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);
        L.marker(e.latlng).addTo(map)
            .bindPopup('<br><a href="{{ route('flags.create') }}?latitude=' + latitude + '&longitude=' + longitude + '">Ajouter un signalement</a>');

        // L.circle(e.latlng, radius).addTo(map);
    }
    map.on('locationfound', onLocationFound);

    function onLocationError(e) {
        alert(e.message);
    }
    map.on('locationerror', onLocationError);


    // *************************
    //      Find Me button
    // *************************
    function geoFindMe() {
      const status = document.querySelector('#status');

      function success() {
        status.textContent = '';
        document.getElementById("status").style.display = "none";

        map.locate({setView: true, maxZoom: 16});
        L.marker(e.latlng).addTo(map)
            .bindPopup('<a href="{{ route('flags.create') }}?latitude=' + latitude + '&longitude=' + longitude + '">Ajouter un signalement</a>');
      }

      function error() {
        status.textContent = 'Impossible de vous localiser';
      }

      var geo_options = {
        enableHighAccuracy: true,
        maximumAge        : 30000,
        timeout           : 27000
      }

      if (!navigator.geolocation) {
        status.textContent = 'Geolocation n\'est pas supporté sur votre navigateur';
      } else {
        document.getElementById("status").style.display = "block";

        status.textContent = 'Recherche en cours...';

        // navigator.geolocation.getCurrentPosition(success, error);
        navigator.geolocation.watchPosition(success, error, geo_options);
      }
    }

    document.querySelector('#find-me').addEventListener('click', geoFindMe);


    // *************************
    //      API Flags call
    // *************************
    axios.get('{{ route('api.flags.index') }}')
    .then(function (response) {
        console.log(response.data);
        L.geoJSON(response.data, {
            pointToLayer: function(geoJsonPoint, latlng) {
                return L.marker(latlng);
            }
        })
        .bindPopup(function (layer) {
            return layer.feature.properties.map_popup_content;
        }).addTo(map);
    })
    .catch(function (error) {
        console.log(error);
    });


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
        var popupContent = "Your location : " + latitude + ", " + longitude + ".";
        popupContent += '<br><a href="{{ route('flags.create') }}?latitude=' + latitude + '&longitude=' + longitude + '">Ajouter un signalement</a>';
        theMarker = L.marker([latitude, longitude]).addTo(map);
        theMarker.bindPopup(popupContent)
        .openPopup();
    });
    @endcan
</script>
@endpush
