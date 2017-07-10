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
                                $size = sizeof($data->eventoFotos);
                                for($i = 0; $i < $size; $i++){ ?>
                                <div><img src="<?= $data->eventoFotos[$i]->url ?>" width="575" height="575" alt="<?= $data->eventoFotos[$i]->titulo ?>" class="img-responsive"></div>
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
                                <div class="col-xs-4"><img src="<?= $data->eventoFotos[$i]->url ?>" alt="<?= $data->eventoFotos[$i]->titulo ?>" class="img-responsive"></div>
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
                                <li><span>Categoría : </span>Comida</li>
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

                            <div id="additional-information-tab" class="tab-pane fade">
                                <form class="light-inputs">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">Smoking policy : </span>
                                            <input type="text" placeholder="No smoking inside the property">
                                        </div> <!-- end .input-group -->
                                    </div> <!-- end .form-group -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">Parking : </span>
                                            <input type="text" placeholder="Included in resort service charge">
                                        </div> <!-- end .input-group -->
                                    </div> <!-- end .form-group -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">Check in : </span>
                                            <input type="text" placeholder="4.00 pm">
                                        </div> <!-- end .input-group -->
                                    </div> <!-- end .form-group -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">Check out : </span>
                                            <input type="text" placeholder="10.30 pm">
                                        </div> <!-- end .input-group -->
                                    </div> <!-- end .form-group -->
                                </form> <!-- end .light-inputs -->
                            </div> <!-- end #additional-info-tab -->

                            <div id="reviews-tab" class="tab-pane fade">
                                <div class="review clearfix">
                                    <div class="avatar"><img src="images/avatar01.jpg" alt="avatar"></div>
                                    <ul class="meta list-unstyled">
                                        <li class="name">Dignissim Auctor</li>
                                        <li class="rating"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"></li>
                                    </ul> <!-- end .meta -->
                                    <div class="content">
                                        <p>Sed nec fermentum nisi. Vestibulum blandit erat id purus commodo vel luctus .</p>
                                    </div> <!-- end .content -->
                                </div> <!-- end .review -->
                                <div class="review review-tab clearfix">
                                    <div class="avatar"><img src="images/avatar02.jpg" alt="avatar"></div>
                                    <ul class="meta list-unstyled">
                                        <li class="name">Congue Sapien</li>
                                        <li class="rating"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"></li>
                                    </ul> <!-- end .meta -->
                                    <div class="content">
                                        <p>Sed nec fermentum nisi. Vestibulum blandit erat id purus commodo vel luctus .</p>
                                    </div> <!-- end .content -->
                                </div> <!-- end .review -->

                                <div class="add-review">
                                    <h4>Rate and write a review.</h4>
                                    <form>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group light-inputs">
                                                    <input type="text" placeholder="Your Name*" required>
                                                </div> <!-- end .form-group -->
                                            </div> <!-- end .col-sm-6 -->
                                        </div> <!-- end .row -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group light-inputs">
                                                    <input type="email" placeholder="Your@email.com*" required>
                                                </div> <!-- end .form-group -->
                                            </div> <!-- end .col-sm-6 -->
                                        </div> <!-- end .row -->
                                        <div class="form-group light-inputs">
                                            <textarea rows="3" placeholder="Your reviews here ..." required></textarea>
                                        </div> <!-- end .form-group -->
                                        <div class="clearfix">
                                            <fieldset class="rating">
                                                <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                                <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                                <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                                <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                                <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                                <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                            </fieldset>
                                        </div> <!-- end .clearfix -->
                                        <button type="submit" class="button">Submit your reviews</button>
                                    </form>
                                </div> <!-- end .add-review -->
                            </div> <!-- end #reviews-tab -->
                        </div> <!-- end .tab-content -->
                    </div> <!-- end col-md-6 -->
                </div> <!-- end .row -->
            </div> <!-- end .box -->
        </div> <!-- end .container -->
    </div> <!-- end .inner -->
</div> <!-- end .section -->
