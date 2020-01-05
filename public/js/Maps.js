// Objet Maps

class Maps {
    constructor(container) {
        this.container = container;
        // this.latView = lat;
        // this.lngView = lng;
        // this.setView = true;

        this.map = L.map(this.container).locate({setView: true, maxZoom: 16}); // initialisation de la map
        //this.map = L.map(this.container).setView([{{ config('leaflet.map_center_latitude') }}, {{ config('leaflet.map_center_longitude') }}], {{ config('leaflet.zoom_level') }});

        this.tilelayer = L.tileLayer('https://tile.thunderforest.com/cycle/{z}/{x}/{y}.png?apikey=2ee1c74c95c54dd7b150e8f4604e7865', {
            attribution: 'Maps © <a href="http://www.thunderforest.com/" target="_blank">Thunderforest</a>, Data © <a href="http://www.openstreetmap.org/copyright" target="_blank">OpenStreetMap contributors.</a>'
        });
        this.tilelayer.addTo(this.map); // ajout du design à la map
    }
    
};

// Maps(mapid);
