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

require_once (ROOT . '/dto/EventoDTO.php');
require_once (ROOT . '/utilidades/ClassToString.php');

$ev = new EventoDTO();
$ev->setCategoriaId('edpdldlpd');

$evF = new EventoFotoDTO();
$evF->setDescripcion("blablabla");
$evF->setId(1);

$evF2 = new EventoFotoDTO();
$evF2->setDescripcion("okgokogkog");
$evF2->setId(232);

$ev->addEventoFoto($evF);
$ev->addEventoFoto($evF2);

//var_dump($ev);
//echo 'Result: ' . $ev->getCategoriaId() . '<br />';
echo json_encode(ClassToString($ev));

ob_end_flush();
?>