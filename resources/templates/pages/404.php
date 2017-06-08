<div class="page-title" style="background-image: url('images/background09.jpg');">
    <div class="inner">
    </div> <!-- end .inner -->
</div> <!-- end .page-title -->

<div class="section boxed-section light">
    <div class="inner">
        <div class="container">
            <div class="box text-center">
                <div class="error-text">
                    <img src="images/404.png" alt="404" class="img-responsive center-block">
                    <h3>ERROR GENERAL</h3>
                    <p>INTENTA HACER EL PROCESO DE NUEVO</p>
                    <?php
                    if(isset($msg)){
                        ?><p>MENSAJE ERROR: <?= $msg ?></p><?php
                    }
                    ?>
                    <button type="button" class="button" onclick="location.href='index.php'">INICIO</button>
                </div> <!-- end .error-text -->
            </div> <!-- end .box -->
        </div> <!-- end .container -->
    </div> <!-- end .inner -->
</div> <!-- end .section -->