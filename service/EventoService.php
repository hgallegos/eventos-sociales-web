<?php
/**
 * Created by PhpStorm.
 * User: GM-Ta
 * Date: 07-05-2017
 * Time: 18:54
 */
require_once (ROOT . '/utilidades/GetData.php');
Class EventoService{


    private $params;

    public function __construct($params){
        $this->params = $params;
        if(false) {
            $this->params = new UrlParams();
        }

    }

    private function getEvento(){
        $instrucciones = new GlobalParams();
        $instrucciones->setUrl(SERVICE . '/eventos');
        $instrucciones->setSize("20");

        $data = getData($instrucciones);
        return $data;
    }

    private function getCategoria(){
        $instrucciones = new GlobalParams();
        $instrucciones->setUrl(SERVICE . '/evento_categorias');
        $instrucciones->setSize("1000");

        $data = getData($instrucciones);
        return $data;
    }

    public function ConstructorWeb(){

        return $this->capturaWeb();


    }


    private function capturaWeb(){
        //error_reporting(E_ERROR | E_WARNING | E_PARSE);
        ob_start();
        //Iniciadores de contenido
        $categoria_array = $this->getCategoria();
        $categoria = $categoria_array->getContent()->_embedded->evento_categorias;
        $categoria_tamanio = $categoria_array->getContent()->page->totalElements;
        $evento_array = $this->getEvento();
        $evento = $evento_array->getContent()->_embedded->eventos;
        $evento_page = $evento_array->getContent()->page; //totalElements


        if($categoria_array->getDiePage() || $evento_array->getDiePage()){
            $msg = $categoria_array->getStatus() || $evento_array->getStatus();
            error_reporting(0);
            require_once (ROOT . '/resources/templates/pages/404.php');
        }else {
            require_once(ROOT . '/resources/templates/pages/evento_lista.php');
        }
        return ob_get_clean();
    }

    public function capturaScript(){
        ob_start();
        require_once(ROOT . '/resources/templates/scripts/evento_lista.php');
        return ob_get_clean();
    }
}
?>