<?php
/**
 * Created by PhpStorm.
 * User: GM-Ta
 * Date: 07-05-2017
 * Time: 18:54
 */
require_once (ROOT . '/utilidades/GetData.php');
Class InicioService{


    private $params;

    public function __construct($params){
        $this->params = $params;
        if(false) {
            $this->params = new UrlParams();
        }

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

    private function getCategoriaIMG($id){
        $arr = json_decode(CATEGORIA);
        foreach ($arr as $key => $value){
            if($key == $id){
                return $value;
            }
        }
        return $arr->DEFAULT;
    }

    private function capturaWeb(){
        ob_start();
        $categoria_array = $this->getCategoria();
        $categoria = $categoria_array->getContent()->_embedded->evento_categorias;
        $categoria_tamanio = $categoria_array->getContent()->page->totalElements;
        if($categoria_array->getDiePage()){
            $msg = $categoria_array->getStatus();
            error_reporting(0);
            require_once (ROOT . '/resources/templates/pages/404.php');
        }else {
            require_once(ROOT . '/resources/templates/pages/inicio.php');
        }
        return ob_get_clean();
    }

}
?>