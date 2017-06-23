<?php
/**
 * Created by PhpStorm.
 * User: matiasvenegas
 * Date: 08-05-2017
 * Time: 12:02
 */
//$WINDOWSMODE = true;

define('SERVICE', 'http://service.explorecity.site:9090');

if(file_exists ('/var/zpanel') && !isset($WINDOWSMODE)){
    define('ROOT','/var/zpanel/hostdata/panel/public_html');
}elseif (!isset($WINDOWSMODE)){
    define('ROOT',$_SERVER['DOCUMENT_ROOT']);
}else{
    //define('ROOT','C:\Proyectos\eventos-sociales-web');
    define('ROOT','D:\xampp\htdocs\eventos-sociales-web');
}

//Categorias
define('CATEGORIA', json_encode(array(
    '1' => 'highlight-culture.png',
    '2' => 'highlight-food.png',
    '3' => 'highlight-lodging.png',
    '4' => 'highlight-drink.png',
    '5' => 'highlight-shopping.png',
    '6' => 'highlight-nightlife.png',
    'DEFAULT' => 'highlight-food.png'
)));

// Forzar SSL
define('SSL',true);
?>