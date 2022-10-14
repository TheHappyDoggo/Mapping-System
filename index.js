var map = L.map('map').setView([10.6840,122.9563], 25);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 25,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

function setMarker() {
    var latitude = parseFloat(document.getElementById("latitude").value);
    var longitude = parseFloat(document.getElementById("longitude").value);
    var marker = L.marker([latitude, longitude]).addTo(map);
    map.setView([latitude, longitude], 25);
}

// function onMapClick(e) {
//     var mark = L.marker(e.latlng).addTo(map);
// }

// map.on('click', onMapClick);;