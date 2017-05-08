<?php
/**
 * Created by PhpStorm.
 * User: GM-Ta
 * Date: 07-05-2017
 * Time: 18:54
 */
require_once (ROOT . '/utilidades/JsonReader.php');
require_once (ROOT . '/utilidades/JsonToClass.php');
require_once (ROOT . '/dto/EventoDTO.php');
Class EventoService{


    public function __construct(){
    }

    public function obtieneJson(){

        $instrucciones = new GlobalParams();
        $instrucciones->setUrl(SERVICE . '/eventos');
        $instrucciones->setObject(["eventos","evento"]);

        $respusta = jsonReader($instrucciones);

        $obj = JsonToClass($respusta);
        echo $obj[0]->getNombre();
    }
}
?>