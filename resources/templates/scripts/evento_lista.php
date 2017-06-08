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
        if ($('.map').length) {
            var myLatLng = new google.maps.LatLng(40.716269,-74.004566);
            var mapOptions = {
                zoom: 17,
                center: myLatLng,
                scrollwheel: true,
                zoomControl: true,
                scaleControl: false,
                mapTypeControl: false,
                streetViewControl: false
            };
            map = new google.maps.Map(document.getElementById('map'), mapOptions);
        } else {
            return false;
        }

        var marker1LatLng = new google.maps.LatLng(40.715756,-74.005339);
        marker1 = new RichMarker({
            position: marker1LatLng,
            map: map,
            draggable: false,
            flat: true,
            content: '<div class="marker-wrapper" id="marker1">' +
            '<div class="marker"><div class="hover"></div><div class="inner"><img src="images/directory-category-drink.png" alt="icon"></div></div>' +
            '<div class="directory-item">' +
            '<img src="images/directory-slider01.jpg" alt="bg" class="img-responsive">' +
            '<div class="overlay"></div>' +
            '<div class="rating">4.0</div>' +
            '<div class="content">' +
            '<h3><a href="">Not Just Coffee</a></h3>' +
            '<div class="location"><img src="images/directory-location.png" alt="location">Thomas St , NewYork</div>' +
            '</div> <!-- end .content -->' +
            '</div> <!-- end .directory-item -->' +
            '</div>'
        });
        google.maps.event.addListener(marker1, 'click', function() {
            $('.marker-wrapper').removeClass('open');
            $('#marker1').toggleClass('open');
        });





        return false;
    }
    google.maps.event.addDomListener(window, 'load', initialize_map);

</script>
