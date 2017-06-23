<?php
/**
 * Created by PhpStorm.
 * User: GM-Ta
 * Date: 07-05-2017
 * Time: 18:54
 */
require_once (ROOT . '/utilidades/JsonReader.php');
require_once (ROOT . '/utilidades/JsonToClass.php');
require_once (ROOT . '/dto/EventoDTO.php');
require_once (ROOT . '/utilidades/ClassToString.php');
Class PerfilService{

    private $params;

    public function __construct($params){
        $this->params = $params;
        if(false) {
            $this->params = new UrlParams();
        }

    }

    public function ConstructorWeb(){

        return $this->capturaWeb();


    }

    private function capturaWeb(){
        ob_start();
        require_once (ROOT . '/resources/templates/pages/perfil.php');
        return ob_get_clean();
    }

    private function capturaWebGestion(){
        ob_start();
        require_once(ROOT . '/resources/templates/pages/usuario_admin.php');
        return ob_get_clean();
    }

    public function ConstructorWebGestion(){
        return $this->capturaWebGestion();
    }

    public function capturaScriptGestion(){
        ob_start();
        require_once(ROOT . '/resources/templates/scripts/usuario_admin.php');
        return ob_get_clean();
    }
}
?>