<div class="fullscreen-section">
    <div class="left">
        <div id="map" class="map"></div>
    </div> <!-- end .left -->
    <div class="right">
        <div class="inner">
            <div class="directory-filters">
                <form>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" placeholder="¿Qué estás buscando?">
                            </div> <!-- end .form-group -->
                        </div> <!-- end .col-sm-4 -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" placeholder="¿Donde?">
                            </div> <!-- end .form-group -->
                        </div> <!-- end .col-sm-4 -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <select class="selectpicker" data-live-search="true">
                                    <option>Todas las Categorias</option>
                                    <?php
                                    for($i = 0; $i < $categoria_tamanio; $i++){
                                        ?><option><?= $categoria[$i]->nombre ?></option> <?php
                                    }
                                    ?>
                                </select>
                            </div> <!-- end .form-group -->
                        </div> <!-- end .col-sm-4 -->
                    </div> <!-- end .row -->
                </form>
            </div> <!-- end .directory-filters -->
            <div class="directory-tags"><center>
                <div class="tag"><a href="<?= $this->backPage() ?>"><i class="pe-7s-angle-left"></i>Anterior</a></div>
                    <div class="tag"><a href="<?= $this->nextPage($evento_page) ?>">Siguiente<i class="pe-7s-angle-right"></i></a></div></center>
            </div> <!-- end .directory-tags -->
            <div class="directory-list-info">
                <p></p>
                <p class="results"><?= $evento_page->totalElements ?> Resultados - Página (<?= $evento_page->number+1 ?>/<?= $evento_page->totalPages ?>)</p>
            </div>
            <div class="directory-list row">
                <?php
                $size = sizeof($evento);
                if($size == 0){ ?>
                    <p>No existen resultados.</p>
                 <?php
                }
                 for($i = 0; $i < $size; $i++){
                     $url = explode("/",$evento[$i]->_links->self->href);
                    ?>
                <div class="col-sm-6">
                    <div class="directory-item">
                        <?php if(sizeof($evento[$i]->listaFotos) > 0){ ?>
                            <img src="<?= $evento[$i]->listaFotos[0]->url ?>" width="370" height="470" alt="<?= $evento[$i]->listaFotos[0]->titulo ?>" >
                        <?php }else{ ?>
                            <img src="images/directory-slider01.jpg" width="370" height="470" alt="bg" class="img-responsive">
                        <?php } ?>
                        <div class="overlay"></div>
<!--                        <div class="rating">4.0</div>-->
                        <a href="" class="wishlist"><img src="images/directory-heart.png" alt="wishlist"></a>
                        <div class="content">
                            <h3><a href="index.php?page=evento&id=<?= $url[4] ?>"><?= $evento[$i]->nombre ?></a></h3>
                            <p>[<?= date("Y-m-d",strtotime($evento[$i]->fechaInicio)) ?> | <?= date("Y-m-d",strtotime($evento[$i]->fechaFin)) ?>] </p>
                            <p><?= substr($evento[$i]->descripcion,0,80) ?></p>
                            <div class="location" onclick="reload(<?= $evento[$i]->pLat ?>,<?= $evento[$i]->pLng ?>)"><img src="images/directory-location.png" alt="location"><?= $evento[$i]->pDireccion ?></div>
                        </div> <!-- end .content -->
                        <div class="category">
                            <a href=""><img src="images/directory-category-food.png" alt="food"></a>
                        </div> <!-- end .category -->
                    </div> <!-- end .directory-item -->
                </div> <!-- end .col-sm-6 -->
                <?php } ?>
            </div> <!-- end .directory-list -->
        </div> <!-- end .inner -->
    </div> <!-- end .right -->
</div> <!-- end .section -->