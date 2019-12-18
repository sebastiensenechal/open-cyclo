// initialisation de la carte OpenStreetMap et Leaflet


var mapCyclo = null;
var mapLayer = null;
var bikeLabes = null;

var Maps = {
	lat: 48.862725,
	lon: 2.287592,

	initMap : function(position) {
		mapCyclo = L.map(document.getElementById('map'), {scrollWheelZoom:true}).setView([this.lat, this.lon], 13);

		mapLayer = L.tileLayer("https://tile.thunderforest.com/cycle/{z}/{x}/{y}.png?apikey=2ee1c74c95c54dd7b150e8f4604e7865", {
			attribution: 'Maps © <a href="http://www.thunderforest.com/" target="_blank">Thunderforest</a>, Data © <a href="http://www.openstreetmap.org/copyright" target="_blank">OpenStreetMap contributors.</a>',
			minZoom: 8,
			maxZoom: 22
		}).addTo(mapCyclo);

		bikeLabes = L.tileLayer('http://tiles.mapc.org/trailmap-onroad/{z}/{x}/{y}.png',{maxZoom: 22,minZoom: 8}).addTo(mapCyclo);
	},

  // Méthode d'initialisation des markers : Récupère les données de position
  initMarkers : function(latitude, longitude) {
      markers = L.marker([latitude, longitude]).addTo(mapCyclo);
      markers.bindPopup("Vous êtes ici !");
  }

}





function geoFindMe() {

  const status = document.querySelector('#status');

  function success(position) {
    const latitude  = position.coords.latitude;
    const longitude = position.coords.longitude;

    status.textContent = '';
    document.getElementById("status").style.display = "none";

    mapCyclo.setView([latitude, longitude], 17);
    Maps.initMarkers(latitude, longitude);

    console.log(`Latitude: ${latitude} °, Longitude: ${longitude} °`);
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
