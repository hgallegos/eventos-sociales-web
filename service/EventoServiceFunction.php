<?php
/**
 * Created by PhpStorm.
 * User: GM-Ta
 * Date: 22-06-2017
 * Time: 20:28
 */
require_once (ROOT . '/utilidades/GetData.php');
require_once (ROOT . '/service/FotoService.php');
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



    public function creaEvento(){
//        $instrucciones = new GlobalParams();
//        $instrucciones->setUrl(SERVICE . '/eventos');
//
//        $instrucciones->setData($_POST['data']);
//        $data = createData($instrucciones);
//        if(!$data->getDiePage()){
//            return 'OK';
//        }
//        return 'ERROR';
        if(!isset($_POST['titulo'])) {
            return 'No se han recibido parametros.';
        }
        $mysql = $this->makeSQL();
        if(!$smtp = $mysql->prepare('INSERT INTO evento (User_id,Nombre,Descripcion,Fecha_Registro,Fecha_Inicio,Fecha_fin,Visibilidad,P_Nombre,P_Direccion,P_Lat,P_Lng,P_Tipo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)')){
            return 'Error al crear el evento.';
        }
        $hoy = date("Y-m-d H:i:s");
        $user_id = $this->params->getUserId();
        $tipo = "PUBLICO";
        $ptipo = "from AppWeb";
        $smtp->bind_param('ssssssssssss',$user_id,$_POST['titulo'],$_POST['descripcion'],$hoy,$_POST['fechaInicio'],$_POST['fechaFin'],$tipo,$_POST['lugar'],$_POST['direccion'],$_POST['pLat'],$_POST['pLng'],$ptipo);
        $smtp->execute();
        echo $smtp->error;
        $id = $mysql->query("SELECT LAST_INSERT_ID() AS id");
        $id = $id->fetch_object();

        $values = '';
        for($i = 0; $i < sizeof($_POST['categoria']); $i++){
            if($i == 0){
               $values = '(' . $id->id . ',' .  $_POST['categoria'][$i] . ')';
            }else{
                $values .= ',(' . $id->id . ',' .  $_POST['categoria'][$i] . ')';
            }
        }
        if($values != ''){
            $mysql->query('INSERT INTO asigna_categoria (Id_Evento,Id_Categoria) VALUES ' . $values);
            echo $mysql->error;
        }


        $fotoS = new FotoService($this->params);
        $status = ' Fotos: ';

        for($i = 0; $i < sizeof($_FILES['fotos']['name']); $i++) {
            if($_FILES['fotos']['name'][$i] != ''){
                $fotoEnvia['name'] = $_FILES['fotos']['name'][$i];
                $fotoEnvia['tmp_name'] = $_FILES['fotos']['tmp_name'][$i];
                $fotoEnvia['type'] = $_FILES['fotos']['type'][$i];
                $status .= '<br /> ' . $fotoS->creaFoto($id->id,'Evento Foto','Foto del evento',$fotoEnvia);
            }
        }
        return '<script type="application/javascript">
    location.href = "index.php?page=evento&id=' . $id->id . '";
</script>';
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

    private function makeSQL(){
        if(!$mysql = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME)){
            http_response_code(406);
            die;
        }
        mysqli_query($mysql, "SET NAMES 'utf8'");
        return $mysql;
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