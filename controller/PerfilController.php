<?php
/**
 * Created by PhpStorm.
 * User: matiasvenegas
 * Date: 08-05-2017
 * Time: 12:37
 */
require_once (ROOT . '/service/PerfilService.php');
require_once (ROOT . '/utilidades/UrlToClass.php');
class PerfilController{
    private $service;
    private $basic;
    private $params;

    public function __construct($params){
        $this->params = $params;
        $this->basic = $params->params;
        if(false){
            $this->basic = new UrlParams();
        }
        $this->service = new PerfilService($this->basic);
    }

    public function printWeb(){
        $this->params->params->requireLogin();
        $content = '';
        $content .= $this->params->callHeader();
        $content .= $this->params->callMenu();
        $content .= $this->service->ConstructorWeb();
        $content .= $this->params->callFooter();
        return $content;
    }

    public function functionMode(){
        switch ($this->basic->getFunction()){
            case 'login':
                return $this->service->loginSession();
                break;
        }
    }

}