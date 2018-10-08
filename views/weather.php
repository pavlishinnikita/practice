<?php ?>
<html>
    <head>
        <title>Weather</title>
        <link rel="stylesheet" href="../style/weather.css">
        <script>var lat = <?=$this->lat;?> ;var lon=<?=$this->lon;?>;</script>
        <script src="../js/map.js"></script>
    </head>
</html>
<body>
    <?php
    foreach ($this->model as $item){ ?>
        <div class="item">
            <img src="<?="http://openweathermap.org/img/w/".((object)$item)->icon.".png";?>" alt="">
            <span><strong><?=((object)$item)->main;?></strong></span>
            <p><?=((object)$item)->description;?></p>
            <span>Country: </span>
            <span><?=((object)$item)->country.", ".((object)$item)->city;?></span>
            <p><span>Rain for 3 hour:</span><?=((object)$item)->rain;?> mm</p>
            <p><span>Clouds:</span><?=((object)$item)->clouds;?></p>
            <p><span>Wind degrees:</span><?=((object)$item)->deg;?></p>
            <p><span>Wind speed:</span><?=((object)$item)->speed;?></p>
            <p><span>Pressure:</span><?=((object)$item)->pressure;?></p>
            <p><span>Humidity:</span><?=((object)$item)->humidity;?>%</p>
            <p><span>Min temperature:</span><?=((object)$item)->min_temp;?></p>
            <p><span>Max temperature:</span><?=((object)$item)->max_temp;?></p>
            <p><span>Date:</span><?=((object)$item)->dt;?></p>
        </div>
    <?php } ?>
    <div id="map"></div>
    <script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap&key=AIzaSyAGnyk8sjxG-_73Na8HqdJRgkESkHkg0fk">
    </script>
</body>

