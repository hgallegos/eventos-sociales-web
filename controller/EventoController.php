<?php
/**
 * Created by PhpStorm.
 * User: matiasvenegas
 * Date: 08-05-2017
 * Time: 12:37
 */
require_once (ROOT . '/service/EventoService.php');
require_once (ROOT . '/service/EventoServiceFunction.php');
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
        if($this->basic->getFunction() != null) {
            $this->service = new EventoServiceFunction($this->basic);
        }else{
            $this->service = new EventoService($this->basic);
        }
    }

    public function printWeb(){
        $content = '';
        if($this->basic->getId() > 0) {
            $content .= $this->params->callHeader();
            $content .= $this->params->callMenu();
            $content .= $this->service->ConstructorWebEvento();
            $content .= $this->params->callFooter(false);
            $content .= $this->service->capturaScriptVer();
        }elseif($this->basic->getAmode() == 'gestion' && $this->basic->isAdmin()) {
            $content .= $this->params->callHeader();
            $content .= $this->params->callMenu();
            $content .= $this->service->ConstructorWebGestion();
            $content .= $this->params->callFooter(false);
            $content .= $this->service->capturaScriptGestion();
        }elseif($this->basic->getAmode() == 'categoria' && $this->basic->isAdmin()) {
            $content .= $this->params->callHeader();
            $content .= $this->params->callMenu();
            $content .= $this->service->ConstructorWebCategoria();
            $content .= $this->params->callFooter(false);
            $content .= $this->service->capturaScriptCategoria();
        }else{
            $content .= $this->params->callHeader();
            $content .= $this->params->callMenu();
            $content .= $this->service->ConstructorWeb();
            $content .= $this->params->callFooter(false);
            $content .= $this->service->capturaScript();
        }
        return $content;
    }

    public function functionMode(){
        switch ($this->basic->getFunction()){
            case 'ws_eventos':
                return $this->service->capturaEventos();
                break;
            case 'ws_eventos_delete':
                if($this->basic->getId() != null){
                    return $this->service->eliminaEvento($this->basic->getId());
                }
                break;
            case 'ws_eventos_id':
                if($this->basic->getId() != null) {
                    return $this->service->capturaEventoID($this->basic->getId());
                }
                break;
            case 'ws_eventos_save':
                if($this->basic->getId() != null) {
                    return $this->service->guardarEvento($this->basic->getId());
                }
                break;
            case 'ws_categorias':
                return $this->service->capturaCategoria();
                break;
            case 'ws_categorias_delete':
                if($this->basic->getId() != null){
                    return $this->service->eliminaCategoria($this->basic->getId());
                }
                break;
            case 'ws_categorias_id':
                if($this->basic->getId() != null) {
                    return $this->service->capturaCategoriaID($this->basic->getId());
                }
                break;
            case 'ws_categorias_save':
                if($this->basic->getId() != null) {
                    return $this->service->guardarCategoria($this->basic->getId());
                }
                break;
        }
    }

}