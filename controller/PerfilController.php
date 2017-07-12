<?php
/**
 * Created by PhpStorm.
 * User: matiasvenegas
 * Date: 08-05-2017
 * Time: 12:37
 */
require_once (ROOT . '/service/PerfilService.php');
require_once (ROOT . '/service/PerfilServiceFunction.php');
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
        if($this->basic->getFunction() != null){
            $this->service = new PerfilServiceFunction($this->basic);
        }else {
            $this->service = new PerfilService($this->basic);
        }
    }

    public function printWeb(){
        $content = '';
        if($this->basic->getAmode() != null && $this->basic->isAdmin()) {
            $content .= $this->params->callHeader();
            $content .= $this->params->callMenu();
            $content .= $this->service->ConstructorWebGestion();
            $content .= $this->params->callFooter(false);
            $content .= $this->service->capturaScriptGestion();
        }else{
            $this->params->params->requireLogin();
            $content .= $this->params->callHeader();
            $content .= $this->params->callMenu();
            $content .= $this->service->ConstructorWeb();
            $content .= $this->params->callFooter();
        }
        return $content;
    }

    public function functionMode(){
        switch ($this->basic->getFunction()){
            case 'login':
                return $this->service->loginSession();
                break;
            case 'newaccount':
                return $this->service->createAccount();
                break;
            case 'login_redes_sociales':
                return $this->service->loginWithRedes();
                break;
            case 'modifica':
                return $this->service->modificaPerfil();
                break;
            case 'ws_usuario':
                return $this->service->capturaUsuarios();
                break;
            case 'ws_usuario_delete':
                if($this->basic->getId() != null){
                    return $this->service->eliminaUsuario($this->basic->getId());
                }
                break;
            case 'ws_usuario_id':
                if($this->basic->getId() != null) {
                    return $this->service->capturaUsuarioID($this->basic->getId());
                }
                break;
            case 'ws_usuario_save':
                if($this->basic->getId() != null) {
                    return $this->service->guardarUsuario($this->basic->getId());
                }
                break;
        }
    }

}