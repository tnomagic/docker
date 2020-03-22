<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Weerayut Pimdee">
    <title>MAP Covid Nakhon Nayok</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>

    <style>
		html, body {
			height: 100%;
			margin: 0;
		}
		#map {
			width: 100%;
			height: 100%;
		}
	</style>
</head>
<body>
<div id="map"></div>

<script>
    var map = L.map('map').setView([14.2036470, 101.2147087], 10);
    mapLink = 
        '<a href="http://openstreetmap.org">OpenStreetMap</a>';
    L.tileLayer(
        'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; ' + mapLink + ' Contributors',
        maxZoom: 18,
        }).addTo(map);

    //var hosIcon = L.icon({
    //iconUrl: 'images/hospital.png',
    //iconSize: [32, 32],
    //popupAnchor: [0, 0],
    //});

    var LeafIcon = L.Icon.extend({
		options: {
			iconSize:     [32, 32],
			popupAnchor:  [0, 0]
		}
	});

    var hosIcon = new LeafIcon({iconUrl: 'images/hospital.png'}),
        ralertIcon = new LeafIcon({iconUrl: 'images/ralert.png'}),
        galertIcon = new LeafIcon({iconUrl: 'images/galert.png'}),
        yalertIcon = new LeafIcon({iconUrl: 'images/yalert.png'});

L.marker([14.2080062,101.2130883], {icon: hosIcon}).bindPopup("โรงพยาบาลนครนายก <br> เลขที่ 1/100 ถนนสุวรรณศร อำเภอเมือง จังหวัดนครนายก 26000 <br> โทรศัพท์ <a href='tel:037311151'>037-311151</a>, <a href='tel:037312440'>037-312440</a> <br> Website <a href='https://www.nayokhospital.go.th/' target='_blank'>www.nayokhospital.go.th</a> <br> <a href='https://goo.gl/maps/97MQhPw8ZzHXTBx96' target='_blank'>Google MAP</a> ").addTo(map); //รพ นครนายก
L.marker([14.2523673,101.0661918], {icon: hosIcon}).bindPopup("โรงพยาบาลบ้านนา<br> 77 หมู่  1 ตำบลพิกุลออก อำเภอบ้านนา จังหวัดนครนายก 26110 <br> โทรศัพท์ <a href='tel:037381832'>037-381832</a> <br> Website <a href='http://www.pakpleehos.com/' target='_blank'>www.pakpleehos.com/</a> <br> <a href='https://goo.gl/maps/8cDkN5quZ3Y4cCvY8' target='_blank'>Google MAP</a> ").addTo(map); //รพ ปากพลี
L.marker([14.1499467,101.2659577], {icon: hosIcon}).bindPopup("โรงพยาบาลปากพลี<br> 233 ตำบล ปากพลี อำเภอปากพลี นครนายก 26130 <br> โทรศัพท์ <a href='tel:037381832'>037-381832</a> <br> Website <a href='https://www.bannahospital.com/' target='_blank'>www.bannahospital.com</a> <br> <a href='https://goo.gl/maps/8cDkN5quZ3Y4cCvY8' target='_blank'>Google MAP</a> ").addTo(map); //รพ บ้านนา
L.marker([14.1251332,101.0053268], {icon: hosIcon}).bindPopup("โรงพยาบาลองครักษ์<br> 300 หมู่ 1 ต อำเภอองครักษ์ นครนายก 26120 <br> โทรศัพท์ <a href='tel:037391511'>037-391511</a> <br> Website <a href='https://ongkharakhospital.go.th/' target='_blank'>www.ongkharakhospital.go.th/</a> <br> <a href='https://goo.gl/maps/C6h7s8vQ8fjkDmsE7' target='_blank'>Google MAP</a> ").addTo(map); //รพ องครักษ์

L.marker([], {icon: yalertIcon}).bindPopup("TEST").addTo(map); //รพ องครักษ์

</script>

</body>
</html>