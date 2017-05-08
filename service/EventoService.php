<?php
/**
 * Created by PhpStorm.
 * User: GM-Ta
 * Date: 07-05-2017
 * Time: 18:54
 */
Class EventoService{


    public function __construct(){
    }

    public function obtieneJson(){
        require_once (ROOT . '/utilidades/JsonReader.php');

        $instrucciones = new eventosParams();
        $instrucciones->setUrl('http://192.95.15.158:9090/eventos');
        $instrucciones->setObject("eventos");

        $respusta = jsonReader($instrucciones);

        echo var_dump($respusta->getContent());
    }
}
?>