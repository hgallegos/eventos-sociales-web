<?php
/**
 * Created by Mat-PHP-DTO-CREATOR.
 * User: matias_venegas
 * Date: 07-05-2017
 * Time: 23:20
 */

Class ApiDTO{
    private $id;
    private $userId;
    private $usuario;
    private $contrasena;
    private $estado;

    public function __construct(){
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setUserId($userId){
        $this->userId = $userId;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function setContrasena($contrasena){
        $this->contrasena = $contrasena;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function getId(){
        return $this->id;
    }

    public function getUserId(){
        return $this->userId;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getContrasena(){
        return $this->contrasena;
    }

    public function getEstado(){
        return $this->estado;
    }

}
?>