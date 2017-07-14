<?php
/**
 * Created by PhpStorm.
 * User: GM-Ta
 * Date: 08-06-2017
 * Time: 23:54
 */

?>

<div class="page-title" style="background-image: url('images/santiago_es_chile.jpg');">
    <div class="inner">
        <h2><?= $data->nombre ?></h2>
    </div> <!-- end .inner -->
</div> <!-- end .page-title -->

<div class="section boxed-section light shop-details">
    <div class="inner">
        <div class="container">
            <div class="box">
                <div class="row">
                    <div class="col-md-6">
                        <div class="blog-post gallery product-gallery">
                            <div class="blog-gallery">
                                <?php
                                $size = sizeof($fotos);
                                for($i = 0; $i < $size; $i++){ ?>
                                <div><img src="<?= $fotos[$i]->url ?>" width="575" height="575" alt="<?= $fotos[$i]->titulo ?>" class="img-responsive"></div>
                                <?php }
                                if($size <= 1){
                                    ?><div><img src="images/shop-details01.jpg" alt="image" class="img-responsive"></div><?php
                                }
                                if($size == 0){
                                    ?><div><img src="images/shop-details01.jpg" alt="image" class="img-responsive"></div><?php
                                }
                                ?>
                            </div> <!-- end .blog-gallery -->
                        </div> <!-- end .blog-post -->
                        <div class="row">
                            <div class="product-thumbnails">
                                <?php for($i = 0; $i < $size; $i++){ ?>
                                <div class="col-xs-4"><img src="<?= $fotos[$i]->url ?>" alt="<?= $fotos[$i]->titulo ?>" class="img-responsive"></div>
                                <?php }
                                if($size <= 1){
                                    ?><div class="col-xs-4"><img src="images/shop-details01.jpg" alt="image" class="img-responsive"></div><?php
                                }
                                if($size == 0){
                                    ?><div class="col-xs-4"><img src="images/shop-details01.jpg" alt="image" class="img-responsive"></div><?php
                                }
                                ?>
                            </div> <!-- end .product-thumbnails -->
                        </div> <!-- end .row -->
                    </div> <!-- end col-md-6 -->
                    <div class="col-md-6">
                        <div class="single-map" id="single-map"></div><br /><br />
                        <div class="product-quantity">
<!--                            <button type="button" class="button">Participar</button>-->
                        </div> <!-- end .product-quantity --><br/>
                        <div class="product-info">
                            <ul class="list-unstyled">
                                <li><span>Categoría : </span><?= $this->obtieneCategorias($_GET['id']); ?></li>
                                <li><span>Desde : </span><?= date("Y-m-d H:i",strtotime($data->fechaInicio)) ?></li>
                                <li><span>Hasta : </span><?= date("Y-m-d H:i",strtotime($data->fechaFin)) ?></li>
                                <li><span>Ubicación : </span><?= $data->pDireccion ?></li>
                            </ul>
                        </div> <!-- end .product-info -->

                        <ul class="nav nav-tabs product-info-tabs">
                            <li class="active"><a data-toggle="tab" href="#description-tab">Descripción</a></li>
                            <!--<li><a data-toggle="tab" href="#additional-information-tab">Additional Information</a></li> -->
<!--                            <li><a data-toggle="tab" href="#reviews-tab">Lista Participantes</a></li>-->
                        </ul> <!-- end .product-info-tabs -->
                        <div class="tab-content">
                            <div id="description-tab" class="tab-pane fade in active">
                                <p><?= $data->descripcion ?></p>
                            </div> <!-- end #description-tab -->
                        </div> <!-- end .tab-content -->
                    </div> <!-- end col-md-6 -->
                </div> <!-- end .row -->
                <button type="button" class="button" onclick="location.href='index.php?page=evento'">Volver</button>
            </div> <!-- end .box -->
        </div> <!-- end .container -->
    </div> <!-- end .inner -->
</div> <!-- end .section -->
