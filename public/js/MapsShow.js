var map;
var tilelayer;
var marker;


var MapsShow = {
	attribution: "Maps © <a href='http://www.thunderforest.com/' target='_blank'>Thunderforest</a>, Data © <a href='http://www.openstreetmap.org/copyright' target='_blank'>OpenStreetMap contributors.</a>",
	urlTile : "https://tile.thunderforest.com/cycle/{z}/{x}/{y}.png?apikey=2ee1c74c95c54dd7b150e8f4604e7865",

	initMap: function([latitude, longitude]) {
		map = L.map('mapid').setView([latitude, longitude], 16);
		tilelayer = L.tileLayer(this.urlTile, {
			attribution : this.attribution,
		}).addTo(map);

		marker = L.marker([latitude, longitude]).addTo(map);
	}

}
