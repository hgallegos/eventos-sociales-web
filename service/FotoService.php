<?php
/**
 * Created by PhpStorm.
 * User: MatGastonPC-Admin
 * Date: 08-07-2017
 * Time: 22:36
 */
Class FotoService
{


    private $params;
    private $cache;
    private $mysql;

    public function __construct($params)
    {
        $this->params = $params;
        if (false) {
            $this->params = new UrlParams();
        }
        if(false){
            $this->mysql = new mysqli();
        }
        $this->makeSQL();

    }

    private function makeSQL(){
        if(!$this->mysql = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME)){
            http_response_code(406);
            die;
        }
        mysqli_query($this->mysql, "SET NAMES 'utf8'");
    }


    public function creaFoto($eventoid = '',$titulo = '',$descripcion = '', $foto = []){
        if($this->check()){
            if($this->subeFoto($foto)){
                if(!$stmt = $this->mysql->prepare("INSERT INTO evento_foto (Evento_Id,Titulo,Descripcion,Url) VALUES (?,?,?,?)")){
                    http_response_code(409);
                    return 'No es posible insertar el elemento en la base de datos.';
                }
                if(isset($_POST['titulo'])){
                    $titulo = $_POST['titulo'];
                }
                if(isset($_POST['descripcion'])){
                    $descripcion = $_POST['descripcion'];
                }
                if(isset($_POST['eventoId'])){
                    $eventoid = $_POST['eventoId'];
                }
                $fotourl = FOTOURL . '/data/fotos/' . $this->cache;
                $stmt->bind_param("ssss", $eventoid,$titulo,$descripcion,$fotourl);
                $stmt->execute();
            }else{
                http_response_code(409);
                return 'Error al subir la foto.';
            }
        }
        http_response_code(201);
        return 'Ok';
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

    private function subeFoto($foto = []){
        if(isset($_FILES["foto"])){
            $foto = $_FILES["foto"];
        }
        $fotoDir = ROOT . "/data/fotos/";
        $imageFileType = pathinfo(basename($foto["name"]),PATHINFO_EXTENSION);

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            return false;
        }

        $this->cache = $this->generateRandomString() . '.' . $imageFileType;
        $target_file = $fotoDir . $this->cache;

        $check = getimagesize($foto["tmp_name"]);
        if($check !== false) {
            if (move_uploaded_file($foto["tmp_name"], $target_file)) {
                return true;
            }
        }
        return false;
    }

    private function check(){
//        if(isset($_POST['eventoId']) && isset($_FILES["foto"])){
            return true;
//        }
//        return false;
    }
}