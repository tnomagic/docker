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
        html,
        body {
            height: 100%;
            margin: 0;
        }

        #map {
            width: 100%;
            height: 100%;
        }

        .leaflet-popup-content-wrapper {
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div id="map"></div>

    <script>
        var map = L.map('map').setView([14.2036470, 101.2147087], 10);
        mapLink =
            '<a href="http://openstreetmap.org">OpenStreetMap</a>';
        mapLink =
            '<a href="http://openstreetmap.org">OpenStreetMap</a>';
        L.tileLayer(
            'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; ' + mapLink + ' Data Create by Weerayut',
                maxZoom: 18,
            }).addTo(map);

        //var hosIcon = L.icon({
        //iconUrl: 'images/hospital.png',
        //iconSize: [32, 32],
        //popupAnchor: [0, 0],
        //});

        var LeafIcon = L.Icon.extend({
            options: {
                iconSize: [32, 32],
                popupAnchor: [0, 0]
            }
        });

        var hosIcon = new LeafIcon({
                iconUrl: 'images/hospital.png'
            }),
            ralertIcon = new LeafIcon({
                iconUrl: 'images/ralert.png'
            }),
            galertIcon = new LeafIcon({
                iconUrl: 'images/galert.png'
            }),
            yalertIcon = new LeafIcon({
                iconUrl: 'images/yalert.png'
            });

        L.marker([14.2080062, 101.2130883], {
            icon: hosIcon
        }).bindPopup("<h3>โรงพยาบาลนครนายก</h3> <br> เลขที่ 1/100 ถนนสุวรรณศร อำเภอเมือง จังหวัดนครนายก 26000 <br> โทรศัพท์ <a href='tel:037311151'>037-311151</a>, <a href='tel:037312440'>037-312440</a> <br> Website <a href='https://www.nayokhospital.go.th/' target='_blank'>www.nayokhospital.go.th</a> <br> <a href='https://goo.gl/maps/97MQhPw8ZzHXTBx96' target='_blank'>Google MAP</a> ").addTo(map); //รพ นครนายก
        L.marker([14.2523673, 101.0661918], {
            icon: hosIcon
        }).bindPopup("<h3>โรงพยาบาลบ้านนา</h3> <br> เลขที่ 77 หมู่  1 ตำบลพิกุลออก อำเภอบ้านนา จังหวัดนครนายก 26110 <br> โทรศัพท์ <a href='tel:037381832'>037-381832</a> <br> Website <a href='http://www.pakpleehos.com/' target='_blank'>www.pakpleehos.com/</a> <br> <a href='https://goo.gl/maps/8cDkN5quZ3Y4cCvY8' target='_blank'>Google MAP</a> ").addTo(map); //รพ ปากพลี
        L.marker([14.1499467, 101.2659577], {
            icon: hosIcon
        }).bindPopup("<h3>โรงพยาบาลปากพลี</h3> <br> เลขที่ 233 ตำบล ปากพลี อำเภอปากพลี นครนายก 26130 <br> โทรศัพท์ <a href='tel:037381832'>037-381832</a> <br> Website <a href='https://www.bannahospital.com/' target='_blank'>www.bannahospital.com</a> <br> <a href='https://goo.gl/maps/8cDkN5quZ3Y4cCvY8' target='_blank'>Google MAP</a> ").addTo(map); //รพ บ้านนา
        L.marker([14.1251332, 101.0053268], {
            icon: hosIcon
        }).bindPopup("<h3>โรงพยาบาลองครักษ์</h3> <br> เลขที่ 300 หมู่ 1 ต อำเภอองครักษ์ นครนายก 26120 <br> โทรศัพท์ <a href='tel:037391511'>037-391511</a> <br> Website <a href='https://ongkharakhospital.go.th/' target='_blank'>www.ongkharakhospital.go.th/</a> <br> <a href='https://goo.gl/maps/C6h7s8vQ8fjkDmsE7' target='_blank'>Google MAP</a> ").addTo(map); //รพ องครักษ์
        L.marker([14.2867392, 101.169127], {
            icon: hosIcon
        }).bindPopup("<h3>โรงพยาบาลโรงเรียนนายร้อยพระจุลจอมเกล้า</h3> <br> เลขที่ 99/6001 ถนนสุวรรณศร ตำบลพรหมณี อำเภอเมือง จังหวัดนครนายก 26001 <br> โทรศัพท์ <a href='tel:037393010'>037393010</a> &nbsp;&nbsp; <a href='tel:037393011'>037393011</a><br>,<a href='tel:037393012'>037393012</a> &nbsp;&nbsp; <a href='tel:037393013'>037393013</a> &nbsp;&nbsp; <a href='tel:037393014'>037393014</a> <br> Website <a href='http://hospital.crma.ac.th/' target='_blank'>hospital.crma.ac.th</a> <br> <a href='https://goo.gl/maps/TCZm8s8AKtBkWe9FA' target='_blank'>Google MAP</a> ").addTo(map); //รพ จปร
        L.marker([14.1088678,100.9822346], {
            icon: hosIcon
        }).bindPopup("<h3>มหาวิทยาลัยศรีนครินทรวิโรฒ องครักษ์</h3> <br> เลขที่ 63 หมู่ 7 ถนนรังสิต-นครนายก คลอง 16 ตำบลองครักษ์ อำเภอองครักษ์ จังหวัดนครนายก 26120 <br> โทรศัพท์ <a href='tel:026495000'>026495000</a><br> Website <a href='https://www.swu.ac.th/' target='_blank'>www.swu.ac.th</a> <br> <a href='https://goo.gl/maps/rP361htuFcZULLgj8' target='_blank'>Google MAP</a> ").addTo(map); //รพ มศว


        //อำเภอเมืองนครนายก
        L.marker([14.1898453, 101.1670748], {
            icon: galertIcon
        }).bindPopup("<h3>ตำบลท่าช้าง </h3> ผู้ต้องเฝ้าระวัง 3 ราย ชาย(1) หญิง(2) <br> ครบ 14 วัน ชาย(1) หญิง(2) <div style='color:green'>ผล: ปลอดภัย</div> ").addTo(map); //ท่าช้าง
        L.marker([14.1457723, 101.1812288], {
            icon: ralertIcon
        }).bindPopup("<h3>ตำบลดงละคร </h3> ผู้ต้องเฝ้าระวัง 3 ราย หญิง(3) <br> ครบ 14 วัน หญิง(2) <div style='color:green'>ผล: ปลอดภัย</div> <br> ยังไม่ครบ หญิง(1) <div style='color:red'>ครบกำหนด 29 มีนาคม 2563</p> ").addTo(map); //ดงละคร
        L.marker([14.2334022, 101.1609828], {
            icon: galertIcon
        }).bindPopup("<h3>ตำบลพรหมณี </h3> ผู้ต้องเฝ้าระวัง 11 ราย ชาย(3) หญิง(8) <br> ครบ 14 วัน ชาย(3) หญิง(8) <div style='color:green'>ผล: ปลอดภัย</div> ").addTo(map); //พรหมณี
        L.marker([14.2144976, 101.2648077], {
            icon: galertIcon
        }).bindPopup("<h3>ตำบลศรีนาวา </h3> ผู้ต้องเฝ้าระวัง 3 ราย หญิง(3) <br> ครบ 14 วัน หญิง(3) <div style='color:green'>ผล: ปลอดภัย</div> ").addTo(map); //ศรีนาวา
        L.marker([14.2143552, 101.2334193], {
            icon: galertIcon
        }).bindPopup("<h3>ตำบลบ้านใหญ่ </h3> ผู้ต้องเฝ้าระวัง 4 ราย ชาย(2) หญิง(2) <br> ครบ 14 วัน ชาย(2) หญิง(2) <div style='color:green'>ผล: ปลอดภัย</div> ").addTo(map); //บ้านใหญ่
        L.marker([14.1814261, 101.1340056], {
            icon: galertIcon
        }).bindPopup("<h3>ตำบลท่าทราย </h3> ผู้ต้องเฝ้าระวัง 1 ราย ชาย(1) <br> ครบ 14 วัน ชาย(1) <div style='color:green'>ผล: ปลอดภัย</div> ").addTo(map); //ท่าทราย
        L.marker([14.2728235, 101.2914633], {
            icon: galertIcon
        }).bindPopup("<h3>ตำบลหินตั้ง </h3> ผู้ต้องเฝ้าระวัง 1 ราย หญิง(1) <br> ครบ 14 วัน หญิง(1) <div style='color:green'>ผล: ปลอดภัย</div> ").addTo(map); //หินตั้ง
        L.marker([14.2844902, 101.2190123], {
            icon: galertIcon
        }).bindPopup("<h3>ตำบลเขาพระ </h3> ผู้ต้องเฝ้าระวัง 1 ราย หญิง(1) <br> ครบ 14 วัน หญิง(1) <div style='color:green'>ผล: ปลอดภัย</div> ").addTo(map); //เขาพระ
        L.marker([14.2594912, 101.2627213], {
            icon: galertIcon
        }).bindPopup("<h3>ตำบลสาริกา </h3> ผู้ต้องเฝ้าระวัง 1 ราย หญิง(1) <br> ครบ 14 วัน หญิง(1) <div style='color:green'>ผล: ปลอดภัย</div> ").addTo(map); //สาริกา 
        L.marker([14.1848283, 101.2002558], {
            icon: galertIcon
        }).bindPopup("<h3>ตำบลวังกระโจม </h3> ผู้ต้องเฝ้าระวัง 2 ราย ชาย(1) หญิง(1) <br> ครบ 14 วัน ชาย(1) หญิง(1) <div style='color:green'>ผล: ปลอดภัย</div> ").addTo(map); //วังกระโจม
        L.marker([14.1550013, 101.1255978], {
            icon: galertIcon
        }).bindPopup("<h3>ตำบลดอนยอ </h3> ผู้ต้องเฝ้าระวัง 1 ราย ชาย(1) <br> ครบ 14 วัน ชาย(1)<div style='color:green'>ผล: ปลอดภัย</div> ").addTo(map); //ดอนยอ
    </script>
</body>

</html>