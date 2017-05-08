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
require_once (ROOT . '/utilidades/ClassToString.php');
Class EventoService{


    public function __construct(){
    }

    public function obtieneJson(){

        $instrucciones = new GlobalParams();
        $instrucciones->setUrl(SERVICE . '/eventos');
        //$instrucciones->setUrl('http://127.0.0.1:88/test.php');
        $instrucciones->setObject("eventos");

        $respusta = jsonReader($instrucciones);

        $obj = JsonToClass($respusta);

        echo json_encode(ClassToString($obj[0]));

    }
}
?>