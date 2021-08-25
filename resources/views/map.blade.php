<div id="map"></div>

<script>
    var map = L.map('map').setView([0, 0], 1);

    L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=4XVGrxzCZYBYVpqyAVTs', {
        attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
    }).addTo(map);

    var leafletIcon = L.icon({
        iconUrl: 'https://sv1.picz.in.th/images/2021/08/20/2GXoG9.png',
        iconSize: [50, 40],
        iconAnchor: [22, 94],
        popupAnchor: [12, -90],

    })

    var marker = L.marker([8.167229425460073, 99.6744958587811], {
        icon: leafletIcon
    }).addTo(map);


    marker.bindPopup("<b>สำนักงานเทศบาลเมืองทุ่งสง</b><br>ไ่ม่มีน้ำท่วม").openPopup();
</script>