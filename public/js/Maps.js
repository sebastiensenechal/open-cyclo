// Objet Maps



var map;

class Maps {
  map_center_latitude  = 48.862725;
  map_center_longitude = 2.287592;
  zoom_level = 10;

    constructor(container) {
        this.container = container;
        this.initMap();
        this.axiosGet();

    }

    initMap() {
        // this.map = L.map('mapid').locate({setView: true, zoom: 16});
        this.map = L.map(this.container).setView([this.map_center_latitude, this.map_center_longitude], this.zoom_level);
        this.tilelayer = L.tileLayer('https://tile.thunderforest.com/cycle/{z}/{x}/{y}.png?apikey=2ee1c74c95c54dd7b150e8f4604e7865', {
            attribution : 'Maps © <a href="http://www.thunderforest.com/" target="_blank">Thunderforest</a>, Data © <a href="http://www.openstreetmap.org/copyright" target="_blank">OpenStreetMap contributors.</a>',
            maxZoom : 20
        }).addTo(this.map);

        this.control = L.control.locate({
          // strings: {
          //     title: '<a href="{{ route(\'flags.create\') }}?latitude=' + latitude + '&longitude=' + longitude + '">Ajouter un signalement</a>'
          // },
          setView: 'always',
          strings: {
              title: "Trouver ma position",
              popup: "<br><a href=\"flags/create?latitude=' + latitude + '&longitude=' + longitude + '\">Ajouter un signalement</a>",
          },
          locateOptions: {
            enableHighAccuracy: true
          },
          drawCircle: true,
        }

        ).addTo(this.map);
    }

    axiosGet() {
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
          }).addTo(this.map);
      })
      .catch(function (error) {
          console.log(error);
      });
    }


    // initGeoFindMe() {
    //     // var buttonFind = document.querySelector('#find-me');
    //     // buttonFind.onclick = this.geoFindMe();
    //
    //     var buttonFind = document.getElementById('find-me');
    //     buttonFind.addEventListener('click', function() {
    //       if (!navigator.geolocation) {
    //         // this.status.textContent = 'Geolocation n\'est pas supporté sur votre navigateur';
    //       } else {
    //         document.getElementById("status").style.display = "block";
    //
    //         // this.status.textContent = 'Recherche en cours...';
    //         console.log(position);
    //
    //         // navigator.geolocation.getCurrentPosition(success, error);
    //         navigator.geolocation.watchPosition(successFind(position), this.error);
    //       }
    //     });
    //
    //     function successFind(position) {
    //       var latitude  = position.coords.latitude;
    //       var longitude = position.coords.longitude;
    //
    //         this.status.textContent = '';
    //         document.getElementById("status").style.display = "none";
    //
    //         this.map.locate({setView: true, maxZoom: 16});
    //         L.marker([latitude, longitude]).addTo(this.map)
    //             .bindPopup('<a href="{{ route(\'flags.create\') }}?latitude=' + latitude + '&longitude=' + longitude + '">Ajouter un signalement</a>');
    //     }
    // }

    // successFind(position) {
    //   var latitude  = position.coords.latitude;
    //   var longitude = position.coords.longitude;
    //
    //     this.status.textContent = '';
    //     document.getElementById("status").style.display = "none";
    //
    //     this.map.locate({setView: true, maxZoom: 16});
    //     L.marker([latitude, longitude]).addTo(this.map)
    //         .bindPopup('<a href="{{ route(\'flags.create\') }}?latitude=' + latitude + '&longitude=' + longitude + '">Ajouter un signalement</a>');
    // }

};

// Maps(mapid);
