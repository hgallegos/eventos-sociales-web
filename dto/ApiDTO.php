<?php
/**
 * Created by Mat-PHP-DTO-CREATOR.
 * User: matias_venegas
 * Date: 05-05-2017
 * Time: 19:15
 */

Class ApiDTO{
    private $Id;
    private $User_Id;
    private $Usuario;
    private $Contrasena;
    private $Estado;

    public function __construct(){
    }

    public function setId($Id){
        $this->Id = $Id;
    }

    public function setUserId($User_Id){
        $this->User_Id = $User_Id;
    }

    public function setUsuario($Usuario){
        $this->Usuario = $Usuario;
    }

    public function setContrasena($Contrasena){
        $this->Contrasena = $Contrasena;
    }

    public function setEstado($Estado){
        $this->Estado = $Estado;
    }

    public function getId(){
        return $this->Id;
    }

    public function getUserId(){
        return $this->User_Id;
    }

    public function getUsuario(){
        return $this->Usuario;
    }

    public function getContrasena(){
        return $this->Contrasena;
    }

    public function getEstado(){
        return $this->Estado;
    }

}
?>