// Objet Maps
var map;
var control;
var tilelayer;
var customOptions;
var latitude = this.latitude;
var longitude = this.longitude;

var Maps = {
	map_center_latitude: 48.862725,
	map_center_longitude: 2.287592,
	zoom_level : 10,
	latitude: null,
	longitude: null,
	theMarker: null,

	initMap : function() {

		map = L.map('mapid', { dragging: true, touchZoom: true, scrollWheelZoom: false, touchZoom: 'center', }).setView([this.map_center_latitude, this.map_center_longitude], this.zoom_level);
		tilelayer = L.tileLayer('https://tile.thunderforest.com/cycle/{z}/{x}/{y}.png?apikey=2ee1c74c95c54dd7b150e8f4604e7865', {
			attribution : 'Maps © <a href="http://www.thunderforest.com/" target="_blank">Thunderforest</a>, Data © <a href="http://www.openstreetmap.org/copyright" target="_blank">OpenStreetMap contributors.</a>',
			maxZoom : 16
		}).addTo(map);

		infoIcon = L.icon({
			iconUrl: 'img/info-24px.png',
			iconSize: [40, 40],
			popupAnchor:  [0, -20],
			shadowSize:   [50, 64]
		});

		customOptions = {
			'maxWidth': '500',
			'className' : 'custom'
		};

		this.locate();
	},

	locate : function() {
		control = L.control.locate({
			setView: 'always',
			strings: {
				title: "Trouver ma position",
			},
			locateOptions: {
				enableHighAccuracy: true
			},
			drawCircle: true,
			showPopup: false,
			watch: true,
			maxZoom: 10,
			setRadius: 10,
		}).addTo(map);
	},

	geoJson : function() {
		axios.get('api/flags') // {{ route('api.flags.index') }}
		.then(function (response) {
			L.geoJSON(response.data, {
				pointToLayer: function(geoJsonPoint, latlng) {
					// console.log(geoJsonPoint.properties.name);
					return L.marker(latlng, {icon: infoIcon});
				}
			})
			.bindPopup(function (layer) {
				return layer.feature.properties.map_popup_content;
			}, customOptions).addTo(map);
		})
		.catch(function (error) {
			console.log(error);
		});
	},

	addMarker : function() {
		map.on('click', function(e) {
			this.latitude = e.latlng.lat.toString().substring(0, 15);
			this.longitude = e.latlng.lng.toString().substring(0, 15);
			if (this.theMarker != undefined) {
				map.removeLayer(this.theMarker);
			};
			var popupContent = '<p>Un signalement à enregistrer ?<br><p><a href="flags/create?latitude=' + this.latitude + '&longitude=' + this.longitude + '">Ajouter</a></p>';
			// "Your location : " + latitude + ", " + longitude + "."
			this.theMarker = L.marker([this.latitude, this.longitude]).addTo(map);
			this.theMarker.bindPopup(popupContent, customOptions)
			.openPopup();
		});
	}

}
