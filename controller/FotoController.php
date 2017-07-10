<?php
/**
 * Created by PhpStorm.
 * User: matiasvenegas
 * Date: 08-05-2017
 * Time: 12:37
 */
//require_once (ROOT . '/service/EventoService.php');
//require_once (ROOT . '/service/EventoServiceFunction.php');
require_once (ROOT . '/service/FotoService.php');
class FotoController{

    private $service;
    private $params;
    private $basic;

    public function __construct($params){
        $this->params = $params;
        $this->basic = $params->params;
        if(false){
            $this->basic = new UrlParams();
        }
        $this->service = new FotoService($this->basic);
    }

    public function printWeb(){
        $content = '';
        return $content;
    }

    public function functionMode(){
        switch ($this->basic->getFunction()){
            case 'crear':
                return $this->service->creaFoto();
                break;
        }
    }

}