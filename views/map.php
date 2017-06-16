<?php
/**
 * Created by PhpStorm.
 * User: nikita
 * Date: 16.06.2017
 * Time: 14:53
 */
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        #map {
            height: 400px;
            width: 400px;
        }
    </style>
</head>
<body>
<h3>My Google Maps Demo</h3>
<div id="map"></div>
<script>
    function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACreTROcA0CGqR6ifpixQTZIFVo2eHf4w&callback=initMap">
</script>
</body>
</html>

