// Objet Location

class Location {
    constructor(e) {
        this.radius = e.accuracy;
        this.latitude = e.latlng.lat.toString().substring(0, 15);
        this.longitude = e.latlng.lng.toString().substring(0, 15);
    }

    onLocationFound : function(e) {
      L.marker(e.latlng).addTo(Maps.map)
          .bindPopup('<br><a href="{{ route(\'flags.create\') }}?latitude=' + this.latitude + '&longitude=' + this.longitude + '">Ajouter un signalement</a>');

      L.circle(e.latlng, radius).addTo(map);
    }

    onLocationError: function(e) {
        alert(e.message);
    }

};

Maps.map.on('locationfound', onLocationFound);

Maps.map.on('locationerror', onLocationError);
