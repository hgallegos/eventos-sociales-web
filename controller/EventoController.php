<?php
/**
 * Created by PhpStorm.
 * User: matiasvenegas
 * Date: 08-05-2017
 * Time: 12:37
 */
require_once (ROOT . '/service/EventoService.php');
class EventoController{

    private $url;
    private $service;

    public function __construct($url){
        $this->url = $url;
        $this->service = new EventoService();
    }

    public function printWeb(){
        $this->service->obtieneJson();
    }

    public function functionMode(){

    }

}