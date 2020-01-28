var map;
var tilelayer;
var marker;


var MapsShow = {

	initMap: function([latitude, longitude]) {
		map = L.map('mapid').setView([latitude, longitude], 16);
		tilelayer = L.tileLayer('https://tile.thunderforest.com/cycle/{z}/{x}/{y}.png?apikey=2ee1c74c95c54dd7b150e8f4604e7865', {
			attribution : 'Maps © <a href="http://www.thunderforest.com/" target="_blank">Thunderforest</a>, Data © <a href="http://www.openstreetmap.org/copyright" target="_blank">OpenStreetMap contributors.</a>',
		}).addTo(map);

		marker = L.marker([latitude, longitude]).addTo(map);
	}

}
