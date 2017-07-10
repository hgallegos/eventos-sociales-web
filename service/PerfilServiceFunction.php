<?php
/**
 * Created by PhpStorm.
 * User: GM-Ta
 * Date: 22-06-2017
 * Time: 20:28
 */
require_once (ROOT . '/utilidades/GetData.php');
Class PerfilServiceFunction
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

    private function loginJson(){
        $data = null;
        $data = array(
            'user_id' => '103',
            'usuario' => 'matgaston',
            'nombre' => 'Matías Gastón Venegas Ibáñez',
            'correo' => 'matiasgaston.vi@gmail.com',
            'password' => '123abc',
            'nivel' => 'ADMINISTRADOR'
        );
        return $data;
    }

    public function loginSession(){
        $data = $this->loginJson();
        if($data != null){
            $this->params->setUserId($data['user_id']);
            $this->params->setUsername($data['usuario']);
            $this->params->setName($data['nombre']);
            $this->params->setMail($data['correo']);
            $this->params->setPassword($data['password']);
            $this->params->setNivel($data['nivel']);
            $this->params->setIsLogged(true);
            $this->params->goHome();
        }else{
            //Error
            return 'error con la el inicio de usuario';
        }

    }

    public function capturaUsuarios(){
        return '{"data": ' . json_encode($this->procesaUsuario()) . '}';
    }

    private function procesaUsuario(){
        $print = [];
        //$categorias = $this->procesaCategorias();
        $eventos = $this->getUsuario()->_embedded->usuarios;
        for($i = 0; $i < sizeof($eventos); $i++){
            $url = explode("/",$eventos[$i]->_links->self->href);
            $botones = '<a class="remove" onclick="editaUsuario(' . $url[4] . ')"><i class="pe-7s-edit"></i></a>';
            $botones .= '<a class="remove" onclick="deleteUsuario(' . $url[4] . ')"><i class="pe-7s-close-circle"></i></a>';
            $data = [$url[4],$eventos[$i]->usuario,$eventos[$i]->nombre,$eventos[$i]->edad,$eventos[$i]->email,$eventos[$i]->nivel,$botones];
            array_push($print,$data);
        }
        return $print;
    }

    private function getUsuario(){
        $instrucciones = new GlobalParams();
        $instrucciones->setUrl(SERVICE . '/usuarios');
        $instrucciones->setSize("2500");

        if($this->params->getList() > 0){
            $instrucciones->setPage($this->params->getList());
        }

        $data = getData($instrucciones);
        return $data->getContent();
    }

    public function eliminaUsuario($id){
        $instrucciones = new GlobalParams();
        $instrucciones->setUrl(SERVICE . '/usuarios/' . $id);

        $data = deleteData($instrucciones);
        if(!$data->getDiePage()){
            return 'OK';
        }
        return 'ERROR';
    }

    public function capturaUsuarioID($id){
        $instrucciones = new GlobalParams();
        $instrucciones->setUrl(SERVICE . '/usuarios/' . $id);

        $data = getData($instrucciones);
        $data = $data->getContent();

        return json_encode($data);
    }

    public function guardarUsuario($id){
        $instrucciones = new GlobalParams();
        $instrucciones->setUrl(SERVICE . '/usuarios/' . $id);
        $instrucciones->setData($_POST['data']);

        $data = updateData($instrucciones);
        return $data->getContent();

    }

}
?>