<?php
/**
 * Created by PhpStorm.
 * User: GM-Ta
 * Date: 07-05-2017
 * Time: 18:25
 */
require_once(ROOT . "/resources/params/GlobalParams.php");
require_once(ROOT . "/resources/params/InternalStatus.php");
//require_once(ROOT . "/utilidades/TextFormant.php");

function getData($params){
    if(false) {
        $params = new GlobalParams(); //Debug PHPStorm
    }
    $result = new internalStatus();
    if($respond = file_get_contents($params->getUrl("All"))) {
        $contenido = json_decode($respond);
        $result->setContent($contenido);
        $result->setStatus("Datos del servicio obtenidos correctamente.");
        $result->setDiePage(false);
        return $result;
    }
    $result->setStatus("No se puede obtener datos desde el servicio");
    $result->setDiePage(true);
    return $result;
}
function deleteData($params){
    if(false) {
        $params = new GlobalParams(); //Debug PHPStorm
    }
    $result = new internalStatus();
    $url = $params->getUrl("All");
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    $resultado = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $result->setContent($httpCode);
    if($httpCode == 204) {
        $result->setStatus("Datos del servicio obtenidos correctamente.");
        $result->setDiePage(false);
    }else{
        $result->setStatus("No se puede obtener datos desde el servicio");
        $result->setDiePage(true);
    }
    return $result;
}
function updateData($params){
    if(false) {
        $params = new GlobalParams(); //Debug PHPStorm
    }
    $result = new internalStatus();
    $url = $params->getUrl("All");
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params->getData());
    $resultado = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $result->setContent($httpCode);
    if($httpCode) {
        $result->setStatus("Datos del servicio obtenidos correctamente.");
        $result->setDiePage(false);
    }else{
        $result->setStatus("No se puede obtener datos desde el servicio");
        $result->setDiePage(true);
    }
    return $result;
}
?>