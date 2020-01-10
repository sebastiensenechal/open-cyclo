// Objet Maps
var map;
var control;
var mapLayer;
// var theMarker;

var Maps = {
	// Ville de Nantes
	map_center_latitude: 48.862725,
	map_center_longitude: 2.287592,
  zoom_level : 10,


	initMap : function() {
      map = L.map('mapid').setView([this.map_center_latitude, this.map_center_longitude], this.zoom_level);
      tilelayer = L.tileLayer('https://tile.thunderforest.com/cycle/{z}/{x}/{y}.png?apikey=2ee1c74c95c54dd7b150e8f4604e7865', {
          attribution : 'Maps © <a href="http://www.thunderforest.com/" target="_blank">Thunderforest</a>, Data © <a href="http://www.openstreetmap.org/copyright" target="_blank">OpenStreetMap contributors.</a>',
          maxZoom : 20
      }).addTo(map);

      control = L.control.locate({
        // strings: {
        //     title: '<a href="{{ route(\'flags.create\') }}?latitude=' + latitude + '&longitude=' + longitude + '">Ajouter un signalement</a>'
        // },
        setView: 'always',
        strings: {
            title: "Trouver ma position",
             popup: "<br><a href=\"flags/create?latitude=' + latitude + '&longitude=' + longitude + '\">Ajouter un signalement</a>",
            // popup: '<br><a href="flags/create?latitude=' + latitude + '&longitude=' + longitude + '">Ajouter un signalement</a>',
        },
        locateOptions: {
          enableHighAccuracy: true
        },
        drawCircle: true,
        showPopup: false,
      }).addTo(map);
	},

  geoJson : function() {
      axios.get('api/flags') // {{ route('api.flags.index') }}
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
  },

}
