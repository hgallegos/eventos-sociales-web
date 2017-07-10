<?php
/**
 * Created by PhpStorm.
 * User: MatGastonPC-Admin
 * Date: 10-07-2017
 * Time: 14:51
 */
?>
<div class="page-title" style="background-image: url('images/Pucon.jpg');">
    <div class="inner">
        <h2>Contacto</h2>
        <p>Dejános tus comentarios u observaciones</p>
    </div> <!-- end .inner -->
</div> <!-- end .page-title -->
<?php
require_once (ROOT . '/resources/params/UrlParams.php');
$params = new UrlParams();
?>
<div class="section light">
    <div class="inner">
        <div class="container">
            <div class="blog-box">
                <div class="add-comment">
                    <h4>Formulario de Contacto</h4>
                    <div id="contacto_status"></div>
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" placeholder="Nombre" id="contacto_nombre" <?php if($params->getIsLogged()){ echo 'value="' . $params->getName() . '"'; } ?> required>
                                </div> <!-- end .form-group -->
                            </div> <!-- end .col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="email" placeholder="Correo" id="contacto_email" <?php if($params->getIsLogged()){ echo 'value="' . $params->getMail() . '"'; } ?> required>
                                </div> <!-- end .form-group -->
                            </div> <!-- end .col-sm-6 -->
                        </div> <!-- end .row -->
                        <div class="form-group">
                            <textarea rows="3" placeholder="Su comentario..." id="contacto_text" required></textarea>
                        </div> <!-- end .form-group -->
                        <div class="clearfix text-right">
                            <button type="button" class="button" onclick="enviaContacto()">Enviar</button>
                        </div> <!-- end .clearfix -->
                    </form>
                </div> <!-- end .add-comment -->
            </div> <!-- end .blog-box -->
        </div> <!-- end .container -->
    </div> <!-- end .inner -->
</div> <!-- end .section -->
<script type="application/javascript">
    function enviaContacto() {
        document.getElementById('contacto_status').innerHTML = loader;
        if(document.getElementById('contacto_nombre').value == '' || document.getElementById('contacto_email').value == '' || document.getElementById('contacto_text').value == ''){
            document.getElementById('contacto_status').innerHTML = '<center><strong><font color="red">¡Debe completar todos los campos obligatorios!</font></strong></center>';
            return false;
        }
        setTimeout(function () {
            document.getElementById('contacto_status').innerHTML = '<center><strong><font color="green">¡Formulario enviado correctamente!</font></strong></center>';
        }, 1500);
//        $.ajax({
//            type: 'POST',
//            url: 'index.php?page=perfil&fMode=true&function=modifica',
//            data: {
//                'nombres': document.getElementById('perfil_nombre').value,
//                'email': document.getElementById('perfil_email').value,
//                'password': document.getElementById('perfil_contrasena_actual').value,
//                'password_nueva': document.getElementById('perfil_contrasena_nueva').value
//            },
//            dataType: 'text',
//            success: function (data) {
//                console.log(data);
//                if(data == "1"){
//                    document.getElementById('perfil_status').innerHTML = '<center><strong><font color="red">¡Debe completar todos los campos obligatorios!</font></strong></center>';
//                }
//                if(data == "2"){
//                    document.getElementById('perfil_status').innerHTML = '<center><strong><font color="red">¡La contraseña actual no es correcta!</font></strong></center>';
//                }
//                if(data == "Ok"){
//                    document.getElementById('perfil_status').innerHTML = '<center><strong><font color="green">¡Datos Actualizados!</font></strong></center>';
//                }
//            },
//            error: function (data) {
//                console.log(data);
//                document.getElementById('perfil_status').innerHTML = '<center><strong><font color="red">¡La contraseña actual no es correcta!</font></strong></center>';
//            }
//        });
    }
</script>