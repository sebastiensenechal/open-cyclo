class Map {
    mapView = 'https://tile.thunderforest.com/cycle/{z}/{x}/{y}.png?apikey=2ee1c74c95c54dd7b150e8f4604e7865';
    attribution = 'Maps © <a href="http://www.thunderforest.com/" target="_blank">Thunderforest</a>, Data © <a href="http://www.openstreetmap.org/copyright" target="_blank">OpenStreetMap contributors.</a>';
    latitude = e.latlng.lat.toString().substring(0, 15);
    longitude = e.latlng.lng.toString().substring(0, 15);

    constructor() {
        this.initMap();
        this.initMarker();
    }

    // Méthode d'init de la map
    initMap() {
        this.map = L.map('mapid').locate({setView: true, zoom: 16});
        this.tilelayer = L.tileLayer(this.mapView, {
            attribution : this.attribution,
            maxZoom : 20
        }).addTo(this.map);
    }

    initMarker() {
        var marker = new customMarker([this.latitude, this.longitude], {
            clickable: true
        }).on('click', onClick).addTo(this.map);

        function onClick(e) {
            document.getElementById("popin1").style.opacity = "1";
            document.getElementById("popin1").style.visibility = "visible";
        }

        // //todo get station
        // $.getJSON( "https://api.jcdecaux.com/vls/v1/stations?contract=Nantes&apiKey=fd14c3039a14217b91a0cde0113b12bb97825129", function( data ) {
	      //   var stations = [];
        //     var canvas = document.getElementById("canvas");
        //
        //     $.each( data, function (key, station) {
        //     stations.push( station );
        //
        //         // insère les icons sur la map
        //         if (station.available_bikes > 3) {
        //             var icon = greenIcon;
        //         } else if (station.available_bikes > 0) {
        //             var icon = yellowIcon;
        //         } else {
        //             var icon = redIcon;
        //         }
        //         var marker = L.marker([station.position.lat, station.position.lng], {icon: icon})
        //             .bindPopup(station.address)
        //             .openPopup()
        //             .addTo(this.map)
        //
        //             marker.on("click", function(e) {
        //                 document.getElementById("stationInfo").style.display = "block";
        //                 document.getElementById("canvasBlock").style.display = "none";
        //                 document.getElementById("btnResa").disabled = !(station.available_bikes > 0) // si des vélo sont dispo
        //                 document.getElementById("btnSign").disabled = true;
        //
        //                 // Affiche les différentes infos de la station select. dans le cadre à droite.
        //                 document.getElementById("stationAdress").innerHTML = station.address;
        //                 document.getElementById("avlBikes").innerHTML = station.available_bikes;
        //                 document.getElementById("anchors").innerHTML = station.bike_stands;
        //
        //                 // On insère le nom de la station dans le timer en footer en bas
        //                 document.getElementById("stationName").innerHTML = station.name;
        //             })
        //     }.bind(this))
        // console.log(stations);
        //
        // }.bind(this)); // fin de getJSON

    } // fin de function initIcon


} // fin de class Map

map = new Map()
