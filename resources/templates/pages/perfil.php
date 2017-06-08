<div class="page-title" style="background-image: url('images/background06.jpg');">
    <div class="inner">
        <h2>Editar Perfil</h2>
        <p>Información personal y redes sociales</p>
    </div> <!-- end .inner -->
</div> <!-- end .page-title -->
<?php
require_once (ROOT . '/resources/params/UrlParams.php');
$params = new UrlParams();
?>
<div class="section boxed-section light text-center">
    <div class="inner">
        <div class="container">
            <div class="box">
                <form class="edit-profile-form light-inputs">
                    <h4>Información Personal</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Usuario * :</span>
                                    <input type="text" placeholder="<?= $params->getUsername() ?>" disabled>
                                </div> <!-- end .input-group -->
                            </div> <!-- end .form-group -->
                        </div> <!-- end .col-sm-6 -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Nombre * :</span>
                                    <input type="text" placeholder="<?= $params->getName() ?>" value="<?= $params->getName() ?>" required>
                                </div> <!-- end .input-group -->
                            </div> <!-- end .form-group -->
                        </div> <!-- end .col-sm-6 -->
                    </div> <!-- end .row -->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Email * :</span>
                            <input type="email" placeholder="<?= $params->getMail() ?>" value="<?= $params->getMail() ?>" required>
                        </div> <!-- end .input-group -->
                    </div> <!-- end .form-group -->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Contraseña Actual</span>
                            <input type="password" placeholder="Contraseña Actual">
                        </div> <!-- end .input-group -->
                    </div> <!-- end .form-group -->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Nueva Contraseña :</span>
                            <input type="password" placeholder="Nueva Contraseña">
                        </div> <!-- end .input-group -->
                    </div> <!-- end .form-group -->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Repetir Nueva Contraseña :</span>
                            <input type="password" placeholder="Repetir Nueva Contraseña">
                        </div> <!-- end .input-group -->
                    </div> <!-- end .form-group -->
                    <div class="submit"><button type="submit" class="button">Guardar Cambios</button></div>
                </form>
                <hr>
                <form class="edit-profile-form light-inputs">
                    <h4>Redes Sociales<small> Lista de todas las redes sociales vinculadas a nuestra aplicación</small></h4>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Facebook  (opcional) :</span>
                            <input type="text" placeholder="testuserFacebook">
                        </div> <!-- end .input-group -->
                    </div> <!-- end .form-group -->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Twitter (opcional) :</span>
                            <input type="text" placeholder="testuserTwitter">
                        </div> <!-- end .input-group -->
                    </div> <!-- end .form-group -->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Googleplus (opcional) :</span>
                            <input type="text" placeholder="testuserGoogle">
                        </div> <!-- end .input-group -->
                    </div> <!-- end .form-group -->
                </form>
                <hr>
            </div> <!-- end .box -->
        </div> <!-- end .container -->
    </div> <!-- end .inner -->
</div> <!-- end .section -->