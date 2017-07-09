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
    function initialize_map() {
        if ($('.single-map').length) {
            var myLatLng = new google.maps.LatLng(<?= $data->pLat ?>,<?= $data->pLng ?>);
            var mapOptions = {
                zoom: 17,
                center: myLatLng,
                scrollwheel: true,
                zoomControl: true,
                scaleControl: false,
                mapTypeControl: false,
                streetViewControl: false
            };
            map = new google.maps.Map(document.getElementById('single-map'), mapOptions);
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: '<?= $data->nombre ?>',
                icon: './images/marker.png'
            });
        } else {
            return false;
        }

        return false;
    }
    google.maps.event.addDomListener(window, 'load', initialize_map);

</script>
