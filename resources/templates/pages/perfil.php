<div class="page-title" style="background-image: url('images/Pucon.jpg');">
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
                        <div id="perfil_status"></div>
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
                                    <input type="text" placeholder="<?= $params->getName() ?>" value="<?= $params->getName() ?>" id="perfil_nombre" required>
                                </div> <!-- end .input-group -->
                            </div> <!-- end .form-group -->
                        </div> <!-- end .col-sm-6 -->
                    </div> <!-- end .row -->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Email * :</span>
                            <input type="email" placeholder="<?= $params->getMail() ?>" value="<?= $params->getMail() ?>" id="perfil_email" required>
                        </div> <!-- end .input-group -->
                    </div> <!-- end .form-group -->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Contraseña Actual * :</span>
                            <input type="password" placeholder="Contraseña Actual" id="perfil_contrasena_actual">
                        </div> <!-- end .input-group -->
                    </div> <!-- end .form-group -->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Nueva Contraseña :</span>
                            <input type="password" placeholder="Nueva Contraseña" id="perfil_contrasena_nueva">
                        </div> <!-- end .input-group -->
                    </div> <!-- end .form-group -->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Repetir Nueva Contraseña :</span>
                            <input type="password" placeholder="Repetir Nueva Contraseña" id="perfil_contrasena_nueva2">
                        </div> <!-- end .input-group -->
                    </div> <!-- end .form-group -->
                    <div class="submit"><button type="button" class="button" onclick="modificaPerfil()">Guardar Cambios</button></div>
                </form>
            </div> <!-- end .box -->
        </div> <!-- end .container -->
    </div> <!-- end .inner -->
</div> <!-- end .section -->

<script type="application/javascript">
    function modificaPerfil() {
        document.getElementById('perfil_status').innerHTML = loader;
        if(document.getElementById('perfil_contrasena_nueva').value != document.getElementById('perfil_contrasena_nueva2').value){
            document.getElementById('perfil_status').innerHTML = '<center><strong><font color="red">¡Contraseñas no son iguales!</font></strong></center>';
            return false;
        }
        $.ajax({
            type: 'POST',
            url: 'index.php?page=perfil&fMode=true&function=modifica',
            data: {
                'nombres': document.getElementById('perfil_nombre').value,
                'email': document.getElementById('perfil_email').value,
                'password': document.getElementById('perfil_contrasena_actual').value,
                'password_nueva': document.getElementById('perfil_contrasena_nueva').value
            },
            dataType: 'text',
            success: function (data) {
                console.log(data);
                if(data == "1"){
                    document.getElementById('perfil_status').innerHTML = '<center><strong><font color="red">¡Debe completar todos los campos obligatorios!</font></strong></center>';
                }
                if(data == "2"){
                    document.getElementById('perfil_status').innerHTML = '<center><strong><font color="red">¡La contraseña actual no es correcta!</font></strong></center>';
                }
                if(data == "Ok"){
                    document.getElementById('perfil_status').innerHTML = '<center><strong><font color="green">¡Datos Actualizados!</font></strong></center>';
                }
            },
            error: function (data) {
                console.log(data);
                document.getElementById('perfil_status').innerHTML = '<center><strong><font color="red">¡La contraseña actual no es correcta!</font></strong></center>';
            }
        });
    }
</script>