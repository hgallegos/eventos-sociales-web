<?php
/**
 * Created by PhpStorm.
 * User: GM-Ta
 * Date: 07-05-2017
 * Time: 18:25
 */
require_once(ROOT . "/resources/params/GlobalParams.php");
require_once(ROOT . "/resources/params/InternalStatus.php");
require_once(ROOT . "/utilidades/TextFormant.php");

function jsonReader($params){
    if(false) {
        $params = new GlobalParams(); //Debug PHPStorm
    }
    $result = new internalStatus();
    if($respond = file_get_contents($params->getUrl())) {
        $contenido = json_decode($respond)->_embedded;
        if (is_array($params->getObject())){
            $obj = $params->getObject();
            $result->setContent($contenido->$obj[0]);
            $obj = $obj[1];
        }else{
            $obj = $params->getObject();
            $result->setContent($contenido->$obj);
        }
        $result->setContentName(generaNombre($obj) . 'DTO');
        $result->setStatus("Datos del servicio obtenidos correctamente.");
        $result->setDiePage(false);
        return $result;
    }
    $result->setStatus("No se puede obtener datos desde el servicio");
    $result->setDiePage(true);
    return $result;
}
?>