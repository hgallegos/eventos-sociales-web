<?php
/**
 * Created by PhpStorm.
 * User: matiasvenegas
 * Date: 05-05-2017
 * Time: 11:01
 */
ob_start();

session_start();

$WINDOWSMODE = true;

if(file_exists ('/var/zpanel') && !isset($WINDOWSMODE)){
    define('ROOT','/var/zpanel/hostdata/panel/public_html');
}elseif (!isset($WINDOWSMODE)){
    define('ROOT',$_SERVER['DOCUMENT_ROOT']);
}else{
    define('ROOT','C:\Proyectos\eventos-sociales-web');
}

require_once (ROOT . '/service/EventoService.php');
$ser = new EventoService();
$ser->obtieneJson();

ob_end_flush();
?>