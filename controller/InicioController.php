<?php
/**
 * Created by PhpStorm.
 * User: matiasvenegas
 * Date: 08-05-2017
 * Time: 12:37
 */
require_once (ROOT . '/service/InicioService.php');
require_once (ROOT . '/service/InicioServiceFunction.php');
class InicioController{

    private $params;
    private $basic;

    public function __construct($params){
        $this->params = $params;
        $this->basic = $params->params;
        if(false){
            $this->basic = new UrlParams();
        }
        if($this->basic->getFunction() != null) {
            $this->service = new InicioServiceFunction($this->basic);
        }else{
            $this->service = new InicioService($this->basic);
        }
    }

    public function printWeb(){
        $content = '';
        if($this->basic->getAmode() == 'inicio' && $this->basic->isAdmin()) {
            $content .= $this->params->callHeader();
            $content .= $this->params->callMenu();
            $content .= $this->service->ConstructorWebInicioAdmin();
            $content .= $this->params->callFooter(false);
            $content .= $this->service->capturaScriptInicioAdmin();
        }else {
            switch ($this->basic->getSubpage()) {
                case 'modo_de_uso':
                    $content .= $this->params->callHeader();
                    $content .= $this->params->callMenu();
                    $content .= $this->service->ConstructorWebMDU();
                    $content .= $this->params->callFooter();
                    break;
                case 'contacto':
                    $content .= $this->params->callHeader();
                    $content .= $this->params->callMenu();
                    $content .= $this->service->ConstructorWebContacto();
                    $content .= $this->params->callFooter();
                    break;
                default:
                    $content .= $this->params->callHeader();
                    $content .= $this->params->callMenu();
                    $content .= $this->service->ConstructorWeb();
                    $content .= $this->params->callFooter();
                    break;
            }
        }
        return $content;
    }

    public function functionMode(){

    }


}