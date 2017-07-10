<?php
/**
 * Created by PhpStorm.
 * User: matiasvenegas
 * Date: 08-05-2017
 * Time: 12:02
 */
//Password web hosting: sKKlBwE4l3AW username: explorecity
//$WINDOWSMODE = true;

define('SERVICE', 'http://service.explorecity.site:9090');
define('FOTOURL', 'https://explorecity.site');

if(file_exists ('/var/zpanel') && !isset($WINDOWSMODE)){
    define('ROOT','/var/zpanel/hostdata/panel/public_html');
}elseif (!isset($WINDOWSMODE)){
    define('ROOT',$_SERVER['DOCUMENT_ROOT']);
}else{
    //define('ROOT','C:\Proyectos\eventos-sociales-web');
    define('ROOT','D:\xampp\htdocs\eventos-sociales-web');
}

//Categorias IMG
define('CATEGORIA', json_encode(array(
    '1' => 'highlight-culture.png',
    '2' => 'highlight-food.png',
    '3' => 'highlight-lodging.png',
    '4' => 'highlight-drink.png',
    '5' => 'highlight-shopping.png',
    '6' => 'highlight-nightlife.png',
    'DEFAULT' => 'highlight-food.png'
)));
//Categorias Iconos
define('CATEGORIAICONS', json_encode(array(
    '1' => 'directory-category-wine.png',
    '2' => 'directory-category-food.png',
    '3' => 'directory-category-hotel.png',
    '4' => 'directory-category-drink.png',
    '5' => 'directory-category-shopping.png',
    '6' => 'directory-category-party.png',
    'DEFAULT' => 'directory-category-food.png'
)));

//InternalService
define('DBHOST','service.explorecity.site');
define('DBUSER','fotostore');
define('DBPASS','d9F3DSAbVD');
define('DBNAME','service_app');

// Forzar SSL
define('SSL',true);
?>