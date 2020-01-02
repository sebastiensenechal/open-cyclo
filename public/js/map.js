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

		// bikeLabes = L.tileLayer('http://tiles.mapc.org/trailmap-onroad/{z}/{x}/{y}.png',{maxZoom: 22,minZoom: 8}).addTo(mapCyclo);
	},

  // Méthode d'initialisation des markers : Récupère les données de position
  initMarkers : function(latitude, longitude) {
      markers = L.marker([latitude, longitude]).addTo(mapCyclo);
      markers.bindPopup("Vous êtes ici !");
  },


	// Méthode d'initialisation des markers : Récupère les données de position
  initMarkers2 : function(latitude, longitude) {
			geojson = L.geoJSON(latitude, longitude).addTo(mapCyclo);
  }
	// locate : function() {
	// 	mapCyclo.locate({setView: true, maxZoom: 16});
	// }

}


var Station = {
  name: null,
	statusStation: null,
	nbBicycle: null,
	nbAttachment: null,
	reservation : null,

  // Requête HTTP en AJAX pour récupérer les données de JC Decaux
  ajaxGet: function(url, callback) {
    // Création d'une requête http
    var req = new XMLHttpRequest();
    // Requête HTTP GET asynchrone vers JC Decaux
    req.open("GET", url); // https://api.jcdecaux.com/vls/v1/stations?contract=creteil&apiKey=d695fb95bd1b81a4415ff3959521a2dc5d57e2f1
    // Sécurité : Gestion de l'événement indiquant la fin de la requête
    req.addEventListener("load", function() {
      // Affiche la réponse reçue pour la requête
      if ((req.status >= 200) && (req.status < 400)) {
        console.log(req.responseText);
        callback(req.responseText);
      } else {
        console.error(req.status + " " + req.statusText + " " + url);
      }
    });
    req.addEventListener("error", function(){
      console.error(`Erreur réseau avec l'URL ${url}`);
    });
    // Envoi de la requête
    req.send(null);
  }
}


// Appel de la méthode Ajax et récupération de la liste des stations
Station.ajaxGet("https://opendata.paris.fr/api/records/1.0/search/?dataset=reseau-cyclable&facet=typologie_simple&facet=bidirectionnel&facet=statut&facet=sens_velo&facet=voie&facet=position&facet=circulation&facet=piste&facet=couloir_bus", function(response) {
    var listStations = JSON.parse(response);
		listRecords = listStations.records;

		for (var i = 0; i < listRecords.length; i++) {
				// console.log(listRecords[i]);
				lineRecord = listRecords[i];
				geometry = lineRecord.geometry;
				geo_shape = lineRecord.fields.geo_shape;
				geo_shape_coords = geo_shape.coordinates;

				lon = geometry.coordinates[0];
				lat = geometry.coordinates[1];
				console.log(geo_shape_coords);

				Maps.initMarkers2(lat, lon);
		}

		// for (var i = 0; i < listRecords.length; i++) {
		// 	geometry[i];
		// }

		// // Parcours les données des stations
    // geometry.forEach(function(response) {
    //     console.log(geometry[longitude, latitude]);
    // });

});



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
