// map opties
let mapOptions = {
    center: [51.9237, 4.4759],
    zoom: 13,
    maxBounds: [[50.5, 2.5],[53.8, 7.8]]
};

// Starter variabelen voor OpenStreetMap
let map = new L.map('map', mapOptions);
let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

map.addLayer(layer);

function ReadCreateMarker(titel, omschrijving, latitude, longitude){

    latitude = parseFloat(latitude);
    longitude = parseFloat(longitude);

    let marker = new L.Marker([latitude, longitude]);
    marker.bindPopup("<b>" + titel + "</b><br>" + omschrijving +"<br>").openPopup();
    marker.addTo(map);
}

//ReadCreateMarker("Titel", "letiT", 51.9237, 4.4759);