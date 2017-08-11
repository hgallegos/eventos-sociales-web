<?php
/**
 * Created by PhpStorm.
 * User: GM-Ta
 * Date: 02-06-2017
 * Time: 1:59
 */
?>
<script>

    /*==========  Map  ==========*/
    var map;

    function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('direccion').value;
        geocoder.geocode({'address': address}, function(results, status) {
            if (status === 'OK') {
                resultsMap.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: resultsMap,
                    draggable: true,
                    position: results[0].geometry.location,
                    title: 'Ingresar Evento',
                    icon: './images/location.png'
                });
                google.maps.event.addListener(marker, 'dragend', function(evt){
                    document.getElementById('pLat').value = evt.latLng.lat().toFixed(3);
                    document.getElementById('pLng').value = evt.latLng.lng().toFixed(3);
                    console.log('lat: ' +evt.latLng.lat().toFixed(3) + " lng: " +  evt.latLng.lng().toFixed(3));
                });
            } else {
                alert('No se ha podido encontrar la ubicación por la siguiente razón: ' + status);
            }
        });
    }

    function initialize_map() {
        if ($('.single-map').length) {
            var myLatLng = new google.maps.LatLng(-33.462399,-70.608101);
            var mapOptions = {
                zoom: 17,
                center: myLatLng,
                scrollwheel: true,
                zoomControl: true,
                scaleControl: true,
                mapTypeControl: true,
                streetViewControl: true
            };
            var geocoder = new google.maps.Geocoder();
            map = new google.maps.Map(document.getElementById('single-map'), mapOptions);
            document.getElementById('buscarMap').addEventListener('click', function() {
                geocodeAddress(geocoder, new google.maps.Map(document.getElementById('single-map'), mapOptions));
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                draggable: true,
                map: map,
                title: 'Ingresar Evento',
                icon: './images/location.png'
            });

            google.maps.event.addListener(marker, 'dragend', function(evt){
                document.getElementById('pLat').value = evt.latLng.lat().toFixed(3);
                document.getElementById('pLng').value = evt.latLng.lng().toFixed(3);
                console.log('lat: ' +evt.latLng.lat().toFixed(3) + " lng: " +  evt.latLng.lng().toFixed(3));
            });
        } else {
            return false;
        }

        return false;
    }
    google.maps.event.addDomListener(window, 'load', initialize_map);

</script>
