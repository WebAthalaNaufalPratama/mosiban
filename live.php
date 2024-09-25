<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Live View</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" type="text/css" href="/app-assets/css/app.css">
    <style>
      body {
        font-family: 'Arial', sans-serif;
        padding: 5px;
        text-align: center; /* Center text within the body */
      }
      #map {
        height: 500px;
        border-radius: 10px;
      }
      .button-container {
        display: flex;
        justify-content: center;
        margin-top: 1em;
      }
    
      .btn {
        margin: 0 5px;
        padding: 10px 20px;
        border-radius: 5px;
      }
    </style>
  </head>
  <body>
    <h1 class="text-center">Live View</h1>
      
    <div id="map"></div>
    
     <!--<div class="button-container">-->
     <!--   <button class="btn btn-primary pt-5" onclick="moveToLocation([-7.017327362409765, 110.38608768163427], 'kripik')">Go to Kripik</button>-->
     <!--   <button class="btn btn-primary" onclick="moveToLocation([-7.135251657757373, 110.32386810888377], 'kreo')">Go to Kreo</button>-->
     <!--   <button class="btn btn-primary" onclick="moveToLocation([-7.17128006012898, 110.40285248769901], 'garang')">Go to Garang</button>-->
     <!-- </div>-->
    <script>
      var map = L.map("map").setView([-7.017327362409765, 110.38608768163427], 11);

      L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(map);
      var triangle = L.icon({
        iconUrl: 'assets/triangle.png',
        iconSize:     [40, 40], // size of the icon
        iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
        popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

      const marker1 = L.marker([-7.080611193709205, 110.37741642237324]).addTo(map).bindPopup("kripik"); // kel mangunsari
      const marker2 = L.marker([-7.135251657757373, 110.32386810888377]).addTo(map).bindPopup("kreo");
      const marker3 = L.marker([-7.17128006012898, 110.40285248769901]).addTo(map).bindPopup("garang");
      
      const marker1b = L.marker([-7.0172982224066205, 110.38744100159835], {icon: triangle}).addTo(map).bindPopup("kripik"); //tugu suharto
      const marker2b = L.marker([-7.077455444256219, 110.33386138110338], {icon: triangle}).addTo(map).bindPopup("kreo"); // nirwana resto
      const marker3b = L.marker([-7.1279899403670095, 110.4005491544792], {icon: triangle}).addTo(map).bindPopup("garang"); // smkn ungaran
    
    const updatePopupContent = async () => {
      try {
        const response = await fetch('https://mosiban.com/inc/olah3.php?p=getDataAll');
        let data = await response.json();

        // Kripik
        marker1.bindPopup(`
            <strong><h3>Kripik</h3><hr>${data.kripik.tanggal} | ${data.kripik.waktu}</strong><br><br>
            Curah hujan: ${data.kripik.curah_hujan}
          `);
        marker1b.bindPopup(`
            <strong><h3>Kripik</h3><hr>${data.kripik.tanggal} | ${data.kripik.waktu}</strong><br><br>
            Sedimentasi: ${data.kripik.sed_sim}<br>
            Debit banjir: ${data.kripik.deb_banjir}
          `);
          
        // Kreo
        marker2.bindPopup(`
            <strong><h3>Kreo</h3><hr>${data.kreo.tanggal} | ${data.kreo.waktu}</strong><br><br>
            Curah hujan: ${data.kreo.curah_hujan}
          `);
        marker2b.bindPopup(`
            <strong><h3>Kreo</h3><hr>${data.kreo.tanggal} | ${data.kreo.waktu}</strong><br><br>
            Sedimentasi: ${data.kreo.sed_sim}<br>
            Debit banjir: ${data.kreo.deb_banjir}
          `);
          
        // Garang
        marker3.bindPopup(`
            <strong><h3>Garang</h3><hr>${data.garang.tanggal} | ${data.garang.waktu}</strong><br><br>
            Curah hujan: ${data.garang.curah_hujan}
          `);
        marker3b.bindPopup(`
            <strong><h3>Garang</h3><hr>${data.garang.tanggal} | ${data.garang.waktu}</strong><br><br>
            Sedimentasi: ${data.garang.sed_sim}<br>
            Debit banjir: ${data.garang.deb_banjir}
          `);
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    };
    
    const moveToLocation = (coordinates, loc) => {
      map.setView(coordinates, 13);
      if(loc == 'kripik') {
          marker1.openPopup();
      } else if (loc == 'kreo') {
          marker2.openPopup();
      } else if (loc == 'garang'){
          marker3.openPopup();
      }
    };

    updatePopupContent();

    setInterval(updatePopupContent, 5000);
    </script>
  </body>
</html>
