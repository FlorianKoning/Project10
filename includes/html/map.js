// map opties
let mapOptions = {
    center: [51.9237, 4.4759],
    zoom: 13,
    maxBounds: [[50.5, 2.5],[53.8, 7.8]]
};

// Starter variabelen voor OpenStreetMap
let marker = null;
let map = new L.map('map', mapOptions);
let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

map.addLayer(layer);

// Map checkt of erop wordt geclickt
map.on('click', (event)=> {

    // Checkt of er al een marker is en verwijdert de marker wanneer true
    if(marker !== null){
        map.removeLayer(marker);
    }

    // Maakt marker aan op plek van de muis click
    marker = L.marker([event.latlng.lat , event.latlng.lng]).addTo(map);

    // Haalt de coördinaten op van de locatie van de click
    document.getElementById('latitude').value = event.latlng.lat;
    document.getElementById('longitude').value = event.latlng.lng;
    
})