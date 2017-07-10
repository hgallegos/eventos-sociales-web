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
        if(!isset($_POST['username']) && !isset($_POST['password'])){
            return $data;
        }

        $db = $this->makeSQL();
        $stmt = $db->prepare("SELECT * FROM usuario WHERE (Usuario = ? OR Email = ?) AND Contrasena = ? AND Estado = 1");
        $stmt->bind_param('sss',$_POST['username'],$_POST['username'],$_POST['password']);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows == 1){
            $data = $this->cargaUsuario($db);
        }
        return $data;
    }

    private function cargaUsuario($db){
        $data = null;
        $stmt = $db->prepare("SELECT * FROM usuario WHERE (Usuario = ? OR Email = ?) AND Contrasena = ? AND Estado = 1");
        $stmt->bind_param('sss',$_POST['username'],$_POST['username'],$_POST['password']);
        $stmt->execute();
        $resutl = $stmt->get_result();
        while($row = $resutl->fetch_assoc()){
            $data = array(
                'user_id' => $row['Id'],
                'usuario' => $row['Usuario'],
                'nombre' => $row['Nombre'],
                'correo' => $row['Email'],
                'password' => $row['Contrasena'],
                'nivel' => $row['Nivel']
            );
        }
        return $data;
    }

    public function loginSession(){
        $data = $this->loginJson();
        if($data != null){
            $_SESSION['Persona'] = new stdClass();
            $this->params->setUserId($data['user_id']);
            $this->params->setUsername($data['usuario']);
            $this->params->setName($data['nombre']);
            $this->params->setMail($data['correo']);
            $this->params->setPassword($data['password']);
            $this->params->setNivel($data['nivel']);
            $this->params->setIsLogged(true);
            http_response_code(202);
            return 'Ok';
        }else{
            //Error
            http_response_code(401);
            return 'error con la el inicio de usuario';
        }

    }

    private function createJson($data,$db){
        $stmt = $db->prepare("INSERT INTO usuario (Usuario,Contrasena,Nombre,Edad,Email,Nivel) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param('ssssss',$data['usuario'],$data['password'],$data['nombre'],$data['edad'],$data['correo'],$data['nivel']);
        $stmt->execute();
    }

    private function checkParams(){
        $data = null;
        if(isset($_POST['nombres']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['fechaNacimiento'])
            && $_POST['nombres'] != '' && $_POST['email'] != '' && $_POST['password'] != '' && $_POST['fechaNacimiento'] != '') {
            $data = array(
                'usuario' => $this->generateRandomString(7),
                'nombre' => $_POST['nombres'],
                'correo' => $_POST['email'],
                'password' => $_POST['password'],
                'edad' => $_POST['fechaNacimiento'],
                'nivel' => 'USUARIO'
            );
        }
        return $data;
    }

    private function checkParams2(){
        $data = null;
        if(isset($_POST['nombres']) && isset($_POST['email']) && isset($_POST['password'])
            && $_POST['nombres'] != '' && $_POST['email'] != '' && $_POST['password'] != '') {
            $data = array(
                'nombre' => $_POST['nombres'],
                'correo' => $_POST['email'],
                'password' => $_POST['password'],
                'password_nueva' => $_POST['password_nueva']
            );
        }
        return $data;
    }

    private function updateaPerfil($db,$data){
        $id = $this->params->getUserId();
        if($data['password_nueva'] != '') {
            $stmt = $db->prepare("UPDATE usuario SET Contrasena = ?, Nombre = ?, Email = ? WHERE Id = ?");
            $stmt->bind_param('ssss', $data['password_nueva'],$data['nombre'],$data['correo'],$id);
            $stmt->execute();
            $this->params->setPassword($data['password']);
        }else{
            $stmt = $db->prepare("UPDATE usuario SET Nombre = ?, Email = ? WHERE Id = ?");
            $stmt->bind_param('sss', $data['nombre'],$data['correo'],$id);
            $stmt->execute();
        }
        $this->params->setName($data['nombre']);
        $this->params->setMail($data['correo']);
    }

    public function modificaPerfil(){
        $data = $this->checkParams2();
        if($data == null){
            return '1';
        }
        if($this->params->getPassword() != $data['password']){
            http_response_code(409);
            return '2';
        }
        $db = $this->makeSQL();
        $this->updateaPerfil($db,$data);
        http_response_code(200);
        return 'Ok';

    }

    private function checkMail($db){
        $stmt = $db->prepare("SELECT * FROM usuario WHERE Email = ?");
        $stmt->bind_param('s',$_POST['email']);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows != 0){
            return true;
        }
        return false;
    }

    public function createAccount(){
        $data = $this->checkParams();
        if($data == null){
            http_response_code(409);
            return '1';
        }
        $db = $this->makeSQL();
        if($this->checkMail($db)){
            http_response_code(409);
            return '2';
        }
        $this->createJson($data,$db);
        $_SESSION['Persona'] = new stdClass();
        $id = $db->query("SELECT LAST_INSERT_ID() AS id");
        $id = $id->fetch_object();
        $data['user_id'] = $id->id;
        $this->params->setUserId($data['user_id']);
        $this->params->setUsername($data['usuario']);
        $this->params->setName($data['nombre']);
        $this->params->setMail($data['correo']);
        $this->params->setPassword($data['password']);
        $this->params->setNivel($data['nivel']);
        $this->params->setIsLogged(true);
        http_response_code(201);
        return 'Ok';

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

    private function makeSQL(){
        if(!$mysql = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME)){
            http_response_code(406);
            die;
        }
        mysqli_query($mysql, "SET NAMES 'utf8'");
        return $mysql;
    }

    public function guardarUsuario($id){
        $instrucciones = new GlobalParams();
        $instrucciones->setUrl(SERVICE . '/usuarios/' . $id);
        $instrucciones->setData($_POST['data']);

        $data = updateData($instrucciones);
        return $data->getContent();

    }

    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
?>