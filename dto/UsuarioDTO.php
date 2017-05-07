<?php
/**
 * Created by Mat-PHP-DTO-CREATOR.
 * User: matias_venegas
 * Date: 07-05-2017
 * Time: 23:23
 */

Class UsuarioDTO{
    private $id;
    private $usuario;
    private $contrasena;
    private $nombre;
    private $edad;
    private $email;
    private $token;
    private $nivel;

    public function __construct(){
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function setContrasena($contrasena){
        $this->contrasena = $contrasena;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setEdad($edad){
        $this->edad = $edad;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setToken($token){
        $this->token = $token;
    }

    public function setNivel($nivel){
        $this->nivel = $nivel;
    }

    public function getId(){
        return $this->id;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getContrasena(){
        return $this->contrasena;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getToken(){
        return $this->token;
    }

    public function getNivel(){
        return $this->nivel;
    }

}
?>