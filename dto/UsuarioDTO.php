<?php
/**
 * Created by Mat-PHP-DTO-CREATOR.
 * User: matias_venegas
 * Date: 05-05-2017
 * Time: 17:52
 */

Class UsuarioDTO{
    private $Id;
    private $Usuario;
    private $Contrasena;
    private $Nombre;
    private $Edad;
    private $Email;
    private $Token;
    private $Nivel;

    public function __construct(){
    }

    public function setId($Id){
        $this->Id = $Id;
    }

    public function setUsuario($Usuario){
        $this->Usuario = $Usuario;
    }

    public function setContrasena($Contrasena){
        $this->Contrasena = $Contrasena;
    }

    public function setNombre($Nombre){
        $this->Nombre = $Nombre;
    }

    public function setEdad($Edad){
        $this->Edad = $Edad;
    }

    public function setEmail($Email){
        $this->Email = $Email;
    }

    public function setToken($Token){
        $this->Token = $Token;
    }

    public function setNivel($Nivel){
        $this->Nivel = $Nivel;
    }

    public function getId(){
        return $this->Id;
    }

    public function getUsuario(){
        return $this->Usuario;
    }

    public function getContrasena(){
        return $this->Contrasena;
    }

    public function getNombre(){
        return $this->Nombre;
    }

    public function getEdad(){
        return $this->Edad;
    }

    public function getEmail(){
        return $this->Email;
    }

    public function getToken(){
        return $this->Token;
    }

    public function getNivel(){
        return $this->Nivel;
    }

}
?>