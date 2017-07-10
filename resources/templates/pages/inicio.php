<div class="section large transparent dark text-center" style="background-image: url('images/santiago.jpg');">
    <div class="inner">
        <div class="container">
            <h1>Descubre la Cultura de la Ciudad</h1>
            <p class="lead">Busca el mejor lugar para comer, conocer o divertirte en una localidad.</p>
            <form method="POST" action="index.php?page=evento" id="postFormBusca">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" placeholder="¿Nombre del Evento?" name="evento">
                        </div> <!-- end .form-group -->
                    </div> <!-- end .col-sm-4 -->
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" placeholder="¿Donde?" name="lugar">
                            <i class="pe-7s-world"></i>
                        </div> <!-- end .form-group -->
                    </div> <!-- end .col-sm-4 -->
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="selectpicker" data-live-search="true" name="categoria" id="categoria">
                                <option value="-1">¿Qué estás buscando?</option>
                                <?php
                                for($i = 0; $i < $categoria_tamanio; $i++){
                                    $url = explode("/",$categoria[$i]->_links->self->href);
                                    ?><option value="<?= $url[4] ?>"><?= $categoria[$i]->nombre ?></option> <?php
                                }
                                ?>
                            </select>
                        </div> <!-- end .form-group -->
                    </div> <!-- end .col-sm-4 -->
                </div> <!-- end .row -->
                <button type="submit" class="button">Buscar Evento</button>
            </form>
            <div class="highlight-slider-wrapper">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <p class="lead">O navega en nuestras categorias</p>
                        <div class="highlight-slider">
                            <?php
                            for($i = 0; $i < $categoria_tamanio; $i++){
                                $img = explode("/",$categoria[$i]->_links->self->href);
                                ?>
                                <div class="item">
                                    <button class="icon" onclick="categoriaSelector('<?= $categoria[$i]->nombre ?>')">
                                        <img src="images/<?= $this->getCategoriaIMG($img[4]) ?>" alt="food">
                                        <div class="overlay"><?= $categoria[$i]->nombre ?></div>
                                    </button> <!-- end .icon -->
                                </div> <!-- end .item -->
                                <?php
                            }
                            ?>
                        </div> <!-- end .highlight-slider -->
                    </div> <!-- end .col-md-8 -->
                </div> <!-- end .row -->
            </div> <!-- end .highlight-slider-wrapper -->
        </div> <!-- end .container -->
    </div> <!-- end .inner -->
</div> <!-- end .section -->

<script type="application/javascript">
    function categoriaSelector(id) {
        document.getElementById('categoria').value = id;
        document.getElementById("postFormBusca").submit();

    }
</script>

