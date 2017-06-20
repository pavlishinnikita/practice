/**
 * Created by nikita on 20.06.2017.
 */
function initMap() {
    var uluru = {lat: lat, lng: lon};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 7,
        center: uluru
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });
}