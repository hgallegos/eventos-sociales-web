<?php
/**
 * Created by PhpStorm.
 * User: GM-Ta
 * Date: 22-06-2017
 * Time: 20:28
 */
require_once (ROOT . '/utilidades/GetData.php');
Class EventoServiceFunction
{


    private $params;
    private $cache;

    public function __construct($params)
    {
        $this->params = $params;
        if (false) {
            $this->params = new UrlParams();
        }

    }

    public function eliminaEvento($id){
        $instrucciones = new GlobalParams();
        $instrucciones->setUrl(SERVICE . '/eventos/' . $id);

        $data = deleteData($instrucciones);
        if(!$data->getDiePage()){
            return 'OK';
        }
        return 'ERROR';
    }

    public function eliminaCategoria($id){
        $instrucciones = new GlobalParams();
        $instrucciones->setUrl(SERVICE . '/evento_categorias/' . $id);

        $data = deleteData($instrucciones);
        if(!$data->getDiePage()){
            return 'OK';
        }
        return 'ERROR';
    }

    public function guardarEvento($id){
        $instrucciones = new GlobalParams();
        $instrucciones->setUrl(SERVICE . '/eventos/' . $id);
        $instrucciones->setData($_POST['data']);

        $data = updateData($instrucciones);
        return $data->getContent();

    }

    public function guardarCategoria($id){
        $instrucciones = new GlobalParams();
        $instrucciones->setUrl(SERVICE . '/evento_categorias/' . $id);
        $instrucciones->setData($_POST['data']);

        $data = updateData($instrucciones);
        return $data->getContent();

    }

    public function capturaEventoID($id){
        $instrucciones = new GlobalParams();
        $instrucciones->setUrl(SERVICE . '/eventos/' . $id);

        $data = getData($instrucciones);
        $data = $data->getContent();
        $data->fechaInicio = date("Y-m-d H:i",strtotime($data->fechaInicio));
        $data->fechaFin = date("Y-m-d H:i",strtotime($data->fechaFin));
        return json_encode($data);
    }

    public function capturaCategoriaID($id){
        $instrucciones = new GlobalParams();
        $instrucciones->setUrl(SERVICE . '/evento_categorias/' . $id);

        $data = getData($instrucciones);
        $data = $data->getContent();
        return json_encode($data);
    }

    public function capturaEventos(){
        return '{"data": ' . json_encode($this->procesaEventos()) . '}';
    }

    public function capturaCategoria(){
        return '{"data": ' . json_encode($this->procesaCategoriaWS()) . '}';
    }

    private function procesaCategoriaWS(){
        $print = [];
        //$categorias = $this->procesaCategorias();
        $eventos = $this->getCategorias()->_embedded->evento_categorias;
        for($i = 0; $i < sizeof($eventos); $i++){
            $url = explode("/",$eventos[$i]->_links->self->href);
            $botones = '<a class="remove" onclick="editaCategoria(' . $url[4] . ')"><i class="pe-7s-edit"></i></a>';
            $botones .= '<a class="remove" onclick="deleteCategoria(' . $url[4] . ')"><i class="pe-7s-close-circle"></i></a>';
            $data = [$url[4],$eventos[$i]->nombre,$botones];
            array_push($print,$data);
        }
        return $print;
    }

    private function procesaCategorias(){
        $return[0] = 'DEFAULT';
        $data = $this->getCategorias()->_embedded->evento_categorias;
        for($i = 0; $i < sizeof($data); $i++){
            $url = explode("/",$data[$i]->_links->self->href);
            $return[$url[4]] .= $data[$i]->nombre;
        }
        return $return;
    }

    private function procesaEventos(){
        $print = [];
        //$categorias = $this->procesaCategorias();
        $eventos = $this->getEvento()->_embedded->eventos;
        for($i = 0; $i < sizeof($eventos); $i++){
            $url = explode("/",$eventos[$i]->_links->self->href);
            $botones = '<a class="remove" onclick="editaEvento(' . $url[4] . ')"><i class="pe-7s-edit"></i></a>';
            $botones .= '<a class="remove" onclick="deleteEvento(' . $url[4] . ')"><i class="pe-7s-close-circle"></i></a>';
            $data = [$url[4],$eventos[$i]->nombre,date("Y-m-d H:i",strtotime($eventos[$i]->fechaRegistro)),$eventos[$i]->visibilidad,$eventos[$i]->pNombre,$eventos[$i]->pDireccion,$botones];
            array_push($print,$data);
        }
        return $print;
    }

    private function getCategorias(){
        $instrucciones = new GlobalParams();
        $instrucciones->setUrl(SERVICE . '/evento_categorias');
        $instrucciones->setSize("1000");

        $data = getData($instrucciones);
        return $data->getContent();
    }

    private function getEvento(){
        $instrucciones = new GlobalParams();
        $instrucciones->setUrl(SERVICE . '/eventos');
        $instrucciones->setSize("1000");

        if($this->params->getList() > 0){
            $instrucciones->setPage($this->params->getList());
        }

        $data = getData($instrucciones);
        return $data->getContent();
    }
}
?>