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

    function initialize_map(x,y) {
        if ($('.map').length) {
            var myLatLng = new google.maps.LatLng(x,y);
            var mapOptions = {
                zoom: 12,
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
        <?php
        $size = sizeof($evento);
        for($i = 0; $i < $size; $i++){ ?>

        var marker<?= $i ?>LatLng = new google.maps.LatLng(<?= $evento[$i]->pLat ?>,<?= $evento[$i]->pLng ?>);
        marker<?= $i ?> = new RichMarker({
            position: marker<?= $i ?>LatLng,
            map: map,
            draggable: false,
            flat: true,
            content: '<div class="marker-wrapper" id="marker<?= $i ?>">' +
                <?php if(sizeof($evento[$i]->asignaCategorias) > 0){
                $img = explode("/",$evento[$i]->asignaCategorias[0]->_links->categoria->href);
                    ?>
            '<div class="marker"><div class="hover"></div><div class="inner"><img src="images/<?= $this->getCategoriaICONS($img[4]) ?>" alt="icon"></div></div>' +
                <?php }else{ ?>
            '<div class="marker"><div class="hover"></div><div class="inner"><img src="images/<?= $this->getCategoriaICONS($img[696969]) ?>" alt="icon"></div></div>' +
                <?php } ?>
            '<div class="directory-item">' +
            <?php if(sizeof($evento[$i]->listaFotos) > 0){ ?>
            '<img src="<?= $evento[$i]->listaFotos[0]->url ?>"  alt="<?= $this->quitaSimbolos($evento[$i]->listaFotos[0]->titulo) ?>" class="img-responsive">' +
            <?php }else{ ?>
            '<img src="images/directory-slider01.jpg" alt="bg" class="img-responsive">' +
            <?php } ?>
            '<div class="overlay"></div>' +
            '<div class="content">' +
            '<h3><a href=""><?= $this->quitaSimbolos($evento[$i]->nombre) ?></a></h3>' +
            '<div class="location"><img src="images/directory-location.png" alt="location"><?= $this->quitaSimbolos($evento[$i]->pDireccion) ?></div>' +
            '</div> <!-- end .content -->' +
            '</div> <!-- end .directory-item -->' +
            '</div>'
        });
        google.maps.event.addListener(marker<?= $i ?>, 'click', function() {
            $('.marker-wrapper').removeClass('open');
            $('#marker<?= $i ?>').toggleClass('open');
        });
        <?php } ?>





        return false;
    }
    google.maps.event.addDomListener(window, 'load', initialize_map(<?= $evento[0]->pLat ?>,<?= $evento[0]->pLng ?>));

    function reload(x,y) {
        console.log('Reiniciado ' + x + ' - ' + y);
        google.maps.event.addDomListener(window, 'reload', initialize_map(x,y));
    }

</script>
