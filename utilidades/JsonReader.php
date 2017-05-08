<?php
/**
 * Created by PhpStorm.
 * User: GM-Ta
 * Date: 07-05-2017
 * Time: 18:25
 */
require_once(ROOT . "/resources/params/EventosParams.php");
require_once(ROOT . "/resources/params/InternalStatus.php");

function jsonReader($params){
    if(false) {
        $params = new eventosParams(); //Debug PHPStorm
    }
    $result = new internalStatus();
    if($respond = file_get_contents($params->getUrl())){
        $contenido = json_decode($respond)->_embedded;
        $obj = $params->getObject();
        $result->setContent($contenido->$obj);
        $result->setStatus("Datos del servicio obtenidos correctamente.");
        $result->setDiePage(false);
        return $result;
    }
    $result->setStatus("No se puede obtener datos desde el servicio");
    $result->setDiePage(true);
    return $result;
}
?>