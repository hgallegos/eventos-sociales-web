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
        <h2>Registrar Nuevo Evento</h2>
    </div> <!-- end .inner -->
</div> <!-- end .page-title -->

<div class="section boxed-section light shop-details">
    <div class="inner">
        <div class="container">
            <form class="light-inputs" method="POST" action="index.php?page=evento&fmode=true&function=ws_crea_evento" enctype="multipart/form-data">
            <div class="box">
                <div class="row">
                    <h3>Información del Evento</h3>
                    <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Nombre: </span>
                                    <input type="text" placeholder="Nombre evento" name="titulo" required>
                                    <input type="hidden" name="pLat" value="-33.462399">
                                    <input type="hidden" name="pLng" value="-70.608101">
                                </div> <!-- end .input-group -->
                            </div> <!-- end .form-group -->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Descripción: </span>
                                    <textarea name="descripcion" required></textarea>
                                </div> <!-- end .input-group -->
                            </div> <!-- end .form-group -->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Desde: </span>
                                    <input type="datetime" placeholder="2017-11-28 21:00:00" name="fechaInicio" required>
                                </div> <!-- end .input-group -->
                            </div> <!-- end .form-group -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Hasta: </span>
                                <input type="datetime" placeholder="2017-12-28 21:00:00" name="fechaFin" required>
                            </div> <!-- end .input-group -->
                        </div> <!-- end .form-group -->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Categoria: </span>
                                <select class="selectpicker" data-live-search="true" multiple name="categoria[]" title="Categoria del evento" required>
                                    <?php
                                    for($i = 0; $i < $categoria_tamanio; $i++){
                                        $img = explode("/",$categoria[$i]->asignaCategorias[0]->_links->categoria->href);
                                        ?><option value="<?= $img[4] ?>" <?php if($_POST['categoria'] == $categoria[$i]->nombre){ echo 'selected'; } ?>><?= $categoria[$i]->nombre ?></option> <?php
                                    }
                                    ?>
                                </select>
                                </div>
                            </div> <!-- end .form-group -->
                         <!-- end .light-inputs -->
                        <div class="form-group">
                            <div class="input-group">
                                <h3>Foto(s)</h3>
                                <input type="file" name="fotos[]">
                                <div id="fotos"></div>
                                <center><button type="button" class="button" onclick="agregaFoto()">Más Fotos</button></center>
                            </div> <!-- end .input-group -->
                        </div> <!-- end .form-group -->

                    </div> <!-- end col-md-6 -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Lugar: </span>
                                <input type="text" placeholder="Lugar del evento" name="lugar" required>
                            </div> <!-- end .input-group -->
                        </div> <!-- end .form-group -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Dirección: </span>
                                <input type="text" placeholder="Dirección del evento" name="direccion" required>
                            </div> <!-- end .input-group -->
                        </div> <!-- end .form-group -->

                        <div class="single-map" id="single-map"></div><br /><br />
                        <div class="product-quantity">
<!--                            <button type="button" class="button">Participar</button>-->
                        </div> <!-- end .product-quantity -->
                        <button type="submit" class="button">Guardar Evento</button>
                    </div> <!-- end col-md-6 -->
                </div> <!-- end .row -->
            </div> <!-- end .box -->
            </form>
        </div> <!-- end .container -->
    </div> <!-- end .inner -->
</div> <!-- end .section -->
<script type="application/javascript">
    function agregaFoto() {
        document.getElementById('fotos').innerHTML += '<input type="file" name="fotos[]">';
    }

</script>
