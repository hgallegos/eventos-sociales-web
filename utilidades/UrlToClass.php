<?php
/**
 * Created by PhpStorm.
 * User: matiasvenegas
 * Date: 08-05-2017
 * Time: 12:27
 */
require_once (ROOT . '/resources/params/UrlParams.php');
require_once (ROOT . '/utilidades/TextFormant.php');
function UrlToClass($url){
    $link = new UrlParams();

    foreach ($url as $key => $val) {
        $col = 'set' . generaNombre($key);
        if(method_exists($link,$col)) {
            $link->$col($val);
        }
    }
    return $link;
}
?>