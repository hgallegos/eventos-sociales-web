<?php
/**
 * Created by PhpStorm.
 * User: matiasvenegas
 * Date: 08-05-2017
 * Time: 12:37
 */
require_once (ROOT . '/service/EventoService.php');
class EventoController{

    private $service;
    private $params;
    private $basic;

    public function __construct($params){
        $this->params = $params;
        $this->basic = $params->params;
        if(false){
            $this->basic = new UrlParams();
        }
        $this->service = new EventoService($this->basic);
    }

    public function printWeb(){
        $content = '';
        $content .= $this->params->callHeader();
        $content .= $this->params->callMenu();
        $content .= $this->service->ConstructorWeb();
        $content .= $this->params->callFooter(false);
        $content .= $this->service->capturaScript();
        return $content;
    }

    public function functionMode(){

    }

}