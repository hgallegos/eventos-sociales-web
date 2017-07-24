<?php if($includeFooter){ ?>
<footer class="footer">
    <div class="top">
        <div class="left">
            <div class="logo"><a href="index.html"><img src="images/logo-dark.png" alt="ExploreCity" class="img-responsive"></a></div> <!-- end .logo -->
        </div> <!-- end .left -->
        <div class="social-icons">
            <a href=""><i class="pe-so-facebook"></i></a>
            <a href=""><i class="pe-so-twitter"></i></a>
            <a href=""><i class="pe-so-vimeo"></i></a>
            <a href=""><i class="pe-so-tripadvisor"></i></a>
            <a href=""><i class="pe-so-instagram"></i></a>
            <a href=""><i class="pe-so-google-plus"></i></a>
        </div>
<!--        <div class="right">Blablabla<a href="">+84 968796789</a></div> <!-- end .left -->
    </div> <!-- end .top -->
    <div class="bottom">Copyright &copy; 2017. All Rights Reserved By <a href="">Eventos-Sociales</a></div>
</footer> <!-- end .footer -->
<?php } ?>

<div class="login-wrapper">
    <div class="login">
        <form>
            <div class="form-group" id="login_status"></div>
            <div class="form-group">
                <input type="text" placeholder="Usuario o Correo Electrónico *" id="login_username" required>
            </div> <!-- end .form-group -->
            <div class="form-group">
                <input type="password" placeholder="Contraseña *" id="login_password" required>
            </div> <!-- end .form-group -->
            <div class="clearfix">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Recordar Accesos
                    </label>
                </div>
                <a href="" class="lost-password">¿Olvidó la Contraseña?</a>
            </div> <!-- end .clearfix -->
            <div class="button-wrapper"><button type="button" class="button" onclick="Login()">Ingresar</button></div>
            <div class="text-center">
                <p>¿No tienes cuenta? <a href="" class="signup-open">¡Crear una ahora!</a></p>
                <div class="social">
                    <p>Iniciar sesión con redes sociales</p>
                    <p><a id="custom_signin_button"><img src="images/google-plus.png" alt="google plus"></a>
                        <a onclick="fbLogin()"><img src="images/facebook.png" alt="facebook"></a></p>
                </div> <!-- end .social -->
            </div>
        </form>
    </div> <!-- end .login -->
</div> <!-- end .login-wrapper -->

<div class="signup-wrapper">
    <div class="signup">
        <form>
            <div class="form-group" id="crear_status"></div>
            <!--<div class="form-group">
                <input type="text" placeholder="Nombre de Usuario *" name="username" required>
            </div> <!-- end .form-group -->
            <div class="form-group">
                <input type="text" placeholder="Nombre y Apellido *" id="crear_nombres" required>
            </div> <!-- end .form-group -->
            <div class="form-group">
                <input type="email" placeholder="Correo Electrónico *" id="crear_email" required>
            </div> <!-- end .form-group -->
            <div class="form-group">
                <input type="password" placeholder="Contraseña *" id="crear_password" required>
            </div> <!-- end .form-group -->
            <div class="form-group">
                <input type="password" placeholder="Repetir Contraseña*" id="crear_password2" required>
            </div> <!-- end .form-group -->
            <div class="form-group">
                <input type="date" placeholder="Fecha de Nacimiento" id="crear_fechaNacimiento" required>
            </div> <!-- end .form-group -->
            <div class="button-wrapper"><button type="button" class="button" onclick="crearUsuario()">Registrar</button></div>
            <div class="text-center">
                <div class="g-signin2" data-onsuccess="onSignIn" data-onfailure="onSignInFailure()"></div>
                <p>¿Tienes una cuenta? <a href="" class="login-open"> ¡Ingresa Ahora!</a></p>
                <div class="social">
                    <p>Iniciar sesion con redes sociales</p>
                    <a href=""><img src="images/facebook.png" alt="facebook"></a>
                    <a href=""><img src="images/google-plus.png" alt="google plus"></a>
                </div> <!-- end .social -->
            </div>
        </form>
    </div> <!-- end .signup -->
</div> <!-- end .signup-wrapper -->
<!-- jQuery -->
<script src="js/jquery-3.1.0.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- google maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAy-PboZ3O_A25CcJ9eoiSrKokTnWyAmt8"></script>

<!-- rich marker -->
<script src="js/richmarker.js"></script>
<!-- Owl Carousel -->
<script src="js/owl.carousel.min.js"></script>
<!-- Countdown -->
<script src="js/countdown.js"></script>
<!-- Sweet Alert -->
<script src="js/sweetalert.min.js"></script>
<!-- Nivo Lightbox -->
<script src="scripts/Nivo-Lightbox/nivo-lightbox.min.js"></script>
<!-- NoUISlider -->
<script src="js/jquery.nouislider.all.min.js"></script>
<!-- Bootstrap Select -->
<script src="js/bootstrap-select.min.js"></script>
<!-- Nice Scroll -->
<script src="js/jquery.nicescroll.min.js"></script>
<!-- Scripts.js -->
<script src="js/scripts.js"></script>

<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

<script type="application/javascript">
    var loader = '<center><img src="images/loader.gif" alt="Cargando"></center>';

    function crearUsuario() {
        document.getElementById('login_status').innerHTML = loader;
        if(document.getElementById('crear_password').value != document.getElementById('crear_password2').value){
            document.getElementById('crear_status').innerHTML = '<center><strong><font color="red">¡Contraseñas no son iguales!</font></strong></center>';
            return false;
        }
        $.ajax({
            type: 'POST',
            url: 'index.php?page=perfil&fMode=true&function=newaccount',
            data: {
                'nombres': document.getElementById('crear_nombres').value,
                'email': document.getElementById('crear_email').value,
                'password': document.getElementById('crear_password').value,
                'fechaNacimiento': document.getElementById('crear_fechaNacimiento').value
            },
            dataType: 'text',
            success: function (data) {
                console.log(data);
                if(data == '1'){
                    document.getElementById('crear_status').innerHTML = '<center><strong><font color="red">¡Debe completar todos los campos!</font></strong></center>';
                }
                if(data == '2'){
                    document.getElementById('crear_status').innerHTML = '<center><strong><font color="red">¡El correo ya está registrado!</font></strong></center>';
                }
                if(data == 'Ok'){
                    location.href = 'index.php';
                }
            },
            error: function (data) {
                console.log(data);
                document.getElementById('crear_status').innerHTML = '<center><strong><font color="red">¡Problemas con el ws de cuentas!</font></strong></center>';
            }
        });
    }
    function Login() {
        document.getElementById('crear_status').innerHTML = loader;
        $.ajax({
            type: 'POST',
            url: 'index.php?page=perfil&fMode=true&function=login',
            data: {'username': document.getElementById('login_username').value, 'password': document.getElementById('login_password').value},
            dataType: 'text',
            success: function (data) {
                console.log(data);
                if(data == 'Ok'){
                    location.href = 'index.php';
                }else{
                    document.getElementById('login_status').innerHTML = '<center><strong><font color="red">¡Usuario/Correo o Contraseña Inválidos!</font></strong></center>';
                }
            },
            error: function (data) {
                console.log(data);
                document.getElementById('login_status').innerHTML = '<center><strong><font color="red">¡Usuario/Correo o Contraseña Inválidos!</font></strong></center>';
            }
        });
    }
    function socialNetworkLogin(usuario,nombre,email,socialnetwork) {
        $.ajax({
            type: 'POST',
            url: 'index.php?page=perfil&fMode=true&function=login_redes_sociales',
            data: {
                'usuario':usuario,
                'nombre':nombre,
                'email':email,
                'socialnetwork':socialnetwork
            },
            dataType: 'text',
            success: function (data) {
                console.log(data);
                if(data == 'Ok'){
                    if(socialnetwork == 'Google'){
                        var auth2 = gapi.auth2.getAuthInstance();
                        auth2.signOut().then(function () {
                            console.log('Funcionamiento correcto de google login.');
                        });
                    }
                    if(socialnetwork == 'Facebook'){
                        console.log('Funcionamiento correcto de facebook login.');
                        logoutFB();
                    }
                    location.href = 'index.php';
                }
            },
            error: function (data) {
                console.log(data);
                alert('Error al intentar iniciar sessión.');
            }
        });
    }
</script>
<script>
    var isLoggin = <?php if(isset($_SESSION['Login'])){ echo 'true'; }else{ echo 'false'; } ?>;
    function onSignIn(googleUser) {
        if(isLoggin){
            return;
        }
        var profile = googleUser.getBasicProfile();
        socialNetworkLogin(profile.getId(),profile.getName(),profile.getEmail(),'Google');
    }
    function onSignInFailure() {
        // Handle sign-in errors
        alert('El sistema de login por google ha fallado.');
    }

    function onLoad() {
        gapi.signin2.render('custom_signin_button', {
            'scope': 'profile email',
            'img': 'images/google-plus.png',
            'onsuccess': onSignIn,
            'onfailure': onSignInFailure
        });
    }


    function logoutFB() {
        FB.logout(function(response) {
            // user is now logged out
        });
    }
    function fbLogin() {
        FB.login(function(response) {
            if (response.authResponse) {
                FB.api('/me', function(response) {
                    socialNetworkLogin(response.id,response.name,'','Facebook');
                });
            } else {
                alert('No se pudo ingresar con Facebook.');
            }
        }, {
            scope: 'email'
        });
    }




</script>
<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>

</body>
</html>