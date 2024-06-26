<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Harita Kullanımı</title>
  
  <!-- Önce leaflet.css, sonra leaflet.js olmalı -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

  <style>
    #map {
      width: 600px;
      height: 400px;
    }
  </style>

</head>
<body>

    <div id='map'></div>
    
    
    
   

 

<?php

require_once('db.php');

$SORGU = $DB->prepare("SELECT * FROM sehirler");
$SORGU->execute();
$rows = $SORGU->fetchAll(PDO::FETCH_ASSOC);


   

  ?>
  <script>
    var konumlar =
     [
        <?php
        foreach($rows as $row) {

    echo " ['{$row['sehir']}',   {$row['enlem']},	{$row['boylam']}], '{$row['nufus']}'],\n ";
         } ?>
      ['Adana',   37.003277,	35.3261219],
      ['Adıyaman',   37.7640008, 38.2764355],
     
    ];

    var map = L.map('map');

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    
    var isaretciler = [];
    for (var i = 0; i < konumlar.length; i++) {
        let KonumAdi = konumlar[i][0];
        let Enlem    = konumlar[i][1];
        let Boylam   = konumlar[i][2];
        let nufus   = konumlar[i][3];

        isaretciler.push( L.marker([Enlem, Boylam]).bindPopup(KonumAdi + "şehrinin nufüsu" + nufus ) );
    }
    var isaretciGrubu = L.featureGroup(isaretciler).addTo(map);
    
    // Tüm işaretçiler ekranda görünecek şekilde haritayı ortala
    map.fitBounds(isaretciGrubu.getBounds());

  </script>


</body>
</html>
