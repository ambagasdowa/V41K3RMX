<head>
    <meta charset='utf-8' />
    <title></title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.41.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.41.0/mapbox-gl.css' rel='stylesheet' />

</head>

<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.1.1/mapbox-gl-geocoder.min.js'></script>
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.1.1/mapbox-gl-geocoder.css' type='text/css' />
<div id='map' style='width: 100%; height: 300px;'></div>

<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoidmlrZXJteCIsImEiOiJjajRpanh1eXYwNmNiMzNwaXpheHJmZGVrIn0.9pRpseRR5II53peOzpJBng';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v9',
        center: [-87.0612,20.6501],
        zoom: 13
    });

    map.addControl(new MapboxGeocoder({
        accessToken: mapboxgl.accessToken
    }));


</script>
