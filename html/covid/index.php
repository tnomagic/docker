<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAP</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>

</head>
<body>
<div id="map" style="width: 100%; height: 600px"></div>

<script>
    var map = L.map('map').setView([14.2036470, 101.2147087], 10);
    mapLink = 
        '<a href="http://openstreetmap.org">OpenStreetMap</a>';
    L.tileLayer(
        'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; ' + mapLink + ' Contributors',
        maxZoom: 18,
        }).addTo(map);

    var hosIcon = L.icon({
    iconUrl: 'images/hospital.png',
    iconSize: [32, 32],
    popupAnchor: [-3, -76]}

    var hosIcon = L.icon({
    iconUrl: 'images/hospital.png',
    iconSize: [32, 32],
    popupAnchor: [-3, -76]}
});
L.marker([14.2080062,101.2130883], {icon: hosIcon}).addTo(map); //รพ นครนายก
L.marker([14.1779573,101.0606298], {icon: hosIcon}).addTo(map); //กองร้อยอาสา
</script>

</body>
</html>