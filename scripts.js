var mapBounds = [
    [50.5, 2.5],
    [53.8, 7.8]
];

let mapOptions = {
    center: [51.9237, 4.4759],
    zoom: 13,
    maxBounds: mapBounds
};

let map = new L.map('map', mapOptions);

let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

map.addLayer(layer);

// let marker = new L.Marker([51.9237, 4.4759]);
// marker.bindPopup("<b>Umm akschually</b><br>That is a hydrogen bo-").openPopup();
// marker.addTo(map);

var popup = L.popup();

let marker = null;

map.on('click', (event)=> {

    if(marker !== null){
        map.removeLayer(marker);
    }

    marker = L.marker([event.latlng.lat , event.latlng.lng]).addTo(map);
    
    // function onMapClick(e) {
    //     popup
    //         .setLatLng(event.latlng)
    //         .setContent("You clicked the map at " + event.latlng.toString())
    //         .openOn(map);
    // }
    // onMapClick();

    document.getElementById('latitude').value = event.latlng.lat;
    document.getElementById('longitude').value = event.latlng.lng;
    
})