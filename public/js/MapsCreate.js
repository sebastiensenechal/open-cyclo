var map;
var tilelayer;
var mapCenter = [latitude.defaultValue, longitude.defaultValue];
var marker;


var MapsCreate = {
  latitude: null,
  longitude: null,

  initMap: function() {
      map = L.map('mapid').setView(mapCenter, 16);
      tilelayer = L.tileLayer('https://tile.thunderforest.com/cycle/{z}/{x}/{y}.png?apikey=2ee1c74c95c54dd7b150e8f4604e7865', {
          attribution : 'Maps © <a href="http://www.thunderforest.com/" target="_blank">Thunderforest</a>, Data © <a href="http://www.openstreetmap.org/copyright" target="_blank">OpenStreetMap contributors.</a>',
          maxZoom : 10
      }).addTo(map);

      marker = L.marker(mapCenter).addTo(map);

      this.addUpdateMarker();
  },

  addUpdateMarker: function() {
    map.on('click', function(e) {
        this.latitude = e.latlng.lat.toString().substring(0, 15);
        this.longitude = e.latlng.lng.toString().substring(0, 15);

        document.getElementById("latitude").value = this.latitude;
        document.getElementById("longitude").value = this.longitude;

        marker.setLatLng([this.latitude, this.longitude]);
    });
  }

}
