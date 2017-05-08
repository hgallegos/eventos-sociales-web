<?php
/**
 * Created by PhpStorm.
 * User: matiasvenegas
 * Date: 08-05-2017
 * Time: 12:02
 */
$WINDOWSMODE = true;

define('SERVICE', 'http://192.95.15.158:9090');

if(file_exists ('/var/zpanel') && !isset($WINDOWSMODE)){
    define('ROOT','/var/zpanel/hostdata/panel/public_html');
}elseif (!isset($WINDOWSMODE)){
    define('ROOT',$_SERVER['DOCUMENT_ROOT']);
}else{
    //define('ROOT','C:\Proyectos\eventos-sociales-web');
    define('ROOT','D:\xampp\htdocs\EventosSociales');
}
?>