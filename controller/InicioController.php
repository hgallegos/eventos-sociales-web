<?php
/**
 * Created by PhpStorm.
 * User: matiasvenegas
 * Date: 08-05-2017
 * Time: 12:37
 */
require_once (ROOT . '/service/InicioService.php');
class InicioController{

    private $params;
    private $basic;

    public function __construct($params){
        $this->params = $params;
        $this->basic = $params->params;
        if(false){
            $this->basic = new UrlParams();
        }
        $this->service = new InicioService($this->basic);
    }

    public function printWeb(){
        $content = '';
        switch($this->basic->getSubpage()) {
            case 'modo_de_uso':
                $content .= $this->params->callHeader();
                $content .= $this->params->callMenu();
                $content .= $this->service->ConstructorWebMDU();
                $content .= $this->params->callFooter();
                break;
            default:
                $content .= $this->params->callHeader();
                $content .= $this->params->callMenu();
                $content .= $this->service->ConstructorWeb();
                $content .= $this->params->callFooter();
                break;
        }
        return $content;
    }

    public function functionMode(){

    }


}