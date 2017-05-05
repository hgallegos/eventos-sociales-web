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
    define('ROOT','D:/xampp/htdocs/EventosSociales');
}

require_once (ROOT . '/dto/EventoDTO.php');

$ev = new EventoDTO();
$ev->setCategoriaId("edpdldlpd");

//echo 'Result: ' . $ev->getCategoriaId() . '<br />';
echo json_encode($ev);

ob_end_flush();
?>