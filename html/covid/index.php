<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Weerayut Pimdee">
    <title>MAP Covid Nakhon Nayok</title>
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
    popupAnchor: [0, 0]
    });

    var ralertIcon = L.icon({
    iconUrl: 'images/ralert.png',
    iconSize: [32, 32],
    popupAnchor: [0, 0]
    });


    L.icon = function (options) {
    return new L.Icon(options);
    };

L.marker([14.2080062,101.2130883], {icon: hosIcon}).addTo(map).bindPopup("โรงพยาบาลนครนายก <br> เลขที่ 1/100 ถนนสุวรรณศร อำเภอเมือง จังหวัดนครนายก 26000 <br> โทรศัพท์ <a href='tel:037311151'>037-311151</a>, <a href='tel:037312440'>037-312440</a> <br> Website <a href='https://www.nayokhospital.go.th/' target='_blank'>www.nayokhospital.go.th</a> <br> <a href='https://goo.gl/maps/97MQhPw8ZzHXTBx96' target='_blank'>Google MAP</a> "); //รพ นครนายก
L.marker([14.2523673,101.0661918], {icon: hosIcon}).addTo(map).bindPopup("โรงพยาบาลบ้านนา<br> 77 หมู่  1 ตำบลพิกุลออก อำเภอบ้านนา จังหวัดนครนายก 26110 <br> โทรศัพท์ <a href='tel:037381832'>037-381832</a> <br> Website <a href='http://www.pakpleehos.com/' target='_blank'>http://www.pakpleehos.com/</a> <br> <a href='https://goo.gl/maps/8cDkN5quZ3Y4cCvY8' target='_blank'>Google MAP</a> "); //รพ ปากพลี
L.marker([14.1499467,101.2659577], {icon: hosIcon}).addTo(map).bindPopup("โรงพยาบาลปากพลี<br> 233 ตำบล ปากพลี อำเภอปากพลี นครนายก 26130 <br> โทรศัพท์ <a href='tel:037381832'>037-381832</a> <br> Website <a href='https://www.bannahospital.com/' target='_blank'>www.bannahospital.com</a> <br> <a href='https://goo.gl/maps/8cDkN5quZ3Y4cCvY8' target='_blank'>Google MAP</a> "); //รพ บ้านนา
</script>

</body>
</html>