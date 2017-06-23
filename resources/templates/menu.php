<?php
require_once (ROOT . '/resources/params/UrlParams.php');
$params = new UrlParams();
?>
<header class="header clearfix">
    <div class="left">
        <div class="logo"><a href="index.php"><img src="images/logo.png" alt="ExploreCity" class="img-responsive"></a></div> <!-- end .logo -->
        <form class="header-search">
            <input type="text" placeholder="I’m searching for ...">
            <button type="submit"><i class="pe-7s-search"></i></button>
        </form>
    </div> <!-- end .left -->
    <div class="navigation clearfix">
        <nav class="main-nav">
            <ul class="list-unstyled">
                <li class="menu-item-has-children">
                    <a href="index.php">Explorar</a>
                </li>
                <?php if($params->getIsLogged()){ ?>
                <li class="menu-item-has-children">
                    <a href="index.php?page=perfil">Mi Perfil</a>
                </li>
                <?php } ?>
                <li class="menu-item-has-children">
                    <a href="index.php?subpage=modo_de_uso">Modo de uso</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Contáctanos</a>
                </li>
            </ul>
        </nav> <!-- end .main-nav -->
        <a href="" class="responsive-menu-open"><i class="fa fa-bars"></i></a>
    </div> <!-- end .navigation -->
    <div class="right">
        <!--<a href="" class="button border">Add Listing</a> -->
        <?php if($params->getIsLogged()){ ?>
            <a href="logout.php" class="button border">Salir</a>
        <?php }else{ ?>
            <a href="" class="button login-open">Ingresar</a>
        <?php } ?>
    </div> <!-- end .left -->
</header> <!-- end .header -->
<div class="responsive-menu">
    <a href="" class="responsive-menu-close"><i class="fa fa-times"></i></a>
    <nav class="responsive-nav"></nav> <!-- end .responsive-nav -->
</div> <!-- end .responsive-menu -->
<?php if(isset($_SESSION['Persona']) && $_SESSION['Persona']->nivel == 'ADMINISTRADOR'){ ?>
<div class="page-header">
    <div class="container">
        <nav class="menu">
            <ul class="list-unstyled">
                <li><a href="">Inicio Administrador</a></li>
                <li <?php if(isset($_GET['page']) && $_GET['page'] == 'evento' && isset($_GET['amode']) && $_GET['amode'] == 'gestion'){ echo 'class="active"'; } ?>><a href="index.php?page=evento&amode=gestion">Gestionar Eventos</a></li>
                <li <?php if(isset($_GET['page']) && $_GET['page'] == 'perfil' && isset($_GET['amode'])){ echo 'class="active"'; } ?>><a href="index.php?page=perfil&amode=gestion">Gestionar Usuarios</a></li>
                <li <?php if(isset($_GET['page']) && $_GET['page'] == 'evento' && isset($_GET['amode']) && $_GET['amode'] == 'categoria'){ echo 'class="active"'; } ?>><a href="index.php?page=evento&amode=categoria">Gestionar Categorias</a></li>
            </ul>
        </nav> <!-- end .menu -->
    </div> <!-- end .container -->
</div> <!-- end .page-header -->
<?php } ?>