<?php
/**
 * Created by PhpStorm.
 * User: matiasvenegas
 * Date: 08-05-2017
 * Time: 12:04
 */
require_once (ROOT . '/utilidades/UrlToClass.php');
class Controller{

    private $url;
    private $controller;

    public function __construct(){
        $this->url = UrlToClass($_GET);
        $this->selectController();
    }

    private function selectController(){
        switch ($this->url->getPage()){
            case 'evento':
                require_once (ROOT . '/controller/EventoController.php');
                $this->controller = new EventoController($this->url);
                break;

            case 'inicio':
            default:
                require_once (ROOT . '/controller/InicioController.php');
                $this->controller = new InicioController($this->url);
                break;
        }
    }



    public function printWeb(){
        if ($this->url->getFMode()){
            $this->controller->functionMode();
        }else {
            $this->controller->printWeb();
        }
    }
}
?>