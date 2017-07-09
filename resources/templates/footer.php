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
        <div class="right">Blablabla<a href="">+84 968796789</a></div> <!-- end .left -->
    </div> <!-- end .top -->
    <div class="bottom">Copyright &copy; 2017. All Rights Reserved By <a href="">Eventos-Sociales</a></div>
</footer> <!-- end .footer -->
<?php } ?>

<div class="login-wrapper">
    <div class="login">
        <form method="POST" action="index.php?page=perfil&fMode=true&function=login">
            <div class="form-group">
                <input type="text" placeholder="Usuario o Correo Electrónico *" name="username" required>
            </div> <!-- end .form-group -->
            <div class="form-group">
                <input type="password" placeholder="Contraseña *" name="password" required>
            </div> <!-- end .form-group -->
            <div class="clearfix">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Recordar Accesos
                    </label>
                </div>
                <a href="" class="lost-password">¿Olvidó la Contraseña?</a>
            </div> <!-- end .clearfix -->
            <div class="button-wrapper"><button type="submit" class="button">Ingresar</button></div>
            <div class="text-center">
                <p>¿No tienes cuenta? <a href="" class="signup-open">¡Crear una ahora!</a></p>
                <div class="social">
                    <p>Iniciar sesión con redes sociales</p>
                    <a href=""><img src="images/facebook.png" alt="facebook"></a>
                    <a href=""><img src="images/twitter.png" alt="twitter"></a>
                    <a href=""><img src="images/google-plus.png" alt="google plus"></a>
                </div> <!-- end .social -->
            </div>
        </form>
    </div> <!-- end .login -->
</div> <!-- end .login-wrapper -->

<div class="signup-wrapper">
    <div class="signup">
        <form>
            <!--<div class="form-group">
                <input type="text" placeholder="Nombre de Usuario *" name="username" required>
            </div> <!-- end .form-group -->
            <div class="form-group">
                <input type="text" placeholder="Nombre y Apellido *" name="name" required>
            </div> <!-- end .form-group -->
            <div class="form-group">
                <input type="email" placeholder="Correo Electrónico *" name="email" required>
            </div> <!-- end .form-group -->
            <div class="form-group">
                <input type="password" placeholder="Contraseña *" name="password" required>
            </div> <!-- end .form-group -->
            <div class="form-group">
                <input type="password" placeholder="Repetir Contraseña*" name="password2" required>
            </div> <!-- end .form-group -->
            <div class="button-wrapper"><button type="submit" class="button">Registrar</button></div>
            <div class="text-center">
                <p>¿Tienes una cuenta? <a href="" class="login-open"> ¡Ingresa Ahora!</a></p>
                <div class="social">
                    <p>Iniciar sesion con redes sociales</p>
                    <a href=""><img src="images/facebook.png" alt="facebook"></a>
                    <a href=""><img src="images/twitter.png" alt="twitter"></a>
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

</body>
</html>