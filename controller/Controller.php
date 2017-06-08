<?php
/**
 * Created by PhpStorm.
 * User: matiasvenegas
 * Date: 08-05-2017
 * Time: 12:04
 */
require_once (ROOT . '/utilidades/UrlToClass.php');
class Controller{

    public $params;
    private $controller;

    public function __construct(){
        $this->params = UrlToClass($_GET);
        $this->selectController();
    }

    private function selectController(){
        switch ($this->params->getPage()){
            case 'evento':
                require_once (ROOT . '/controller/EventoController.php');
                $this->controller = new EventoController($this);
                break;

            case 'perfil':
                require_once (ROOT . '/controller/PerfilController.php');
                $this->controller = new PerfilController($this);
                break;

            case 'inicio':
            default:
                require_once (ROOT . '/controller/InicioController.php');
                $this->controller = new InicioController($this);
                break;
        }
    }

    public function callHeader(){
        ob_start();
        require_once (ROOT . '/resources/templates/header.php');
        return ob_get_clean();
    }

    public function callMenu(){
        ob_start();
        require_once (ROOT . '/resources/templates/menu.php');
        return ob_get_clean();
    }

    public function callFooter($includeFooter = true){
        ob_start();
        require_once (ROOT . '/resources/templates/footer.php');
        return ob_get_clean();
    }

    public function callScript($ruta){
        ob_start();
        require_once (ROOT . '/resources/templates/scripts/' . $ruta . '.php');
        return ob_get_clean();
    }


    public function printWeb(){
        if ($this->params->getFMode()){
            $opt = $this->controller->functionMode();
        }else {
            $opt = $this->controller->printWeb();
        }
        return $opt;
    }
}
?>