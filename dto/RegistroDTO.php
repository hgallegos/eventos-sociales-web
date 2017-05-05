<?php
/**
 * Created by Mat-PHP-DTO-CREATOR.
 * User: matias_venegas
 * Date: 05-05-2017
 * Time: 17:52
 */

Class RegistroDTO{
    private $Id;
    private $User_Id;
    private $Api_Id;
    private $Ip;
    private $Fecha;
    private $Actividad;

    public function __construct(){
    }

    public function setId($Id){
        $this->Id = $Id;
    }

    public function setUser_id($User_Id){
        $this->User_Id = $User_Id;
    }

    public function setApi_id($Api_Id){
        $this->Api_Id = $Api_Id;
    }

    public function setIp($Ip){
        $this->Ip = $Ip;
    }

    public function setFecha($Fecha){
        $this->Fecha = $Fecha;
    }

    public function setActividad($Actividad){
        $this->Actividad = $Actividad;
    }

    public function getId(){
        return $this->Id;
    }

    public function getUser_id(){
        return $this->User_Id;
    }

    public function getApi_id(){
        return $this->Api_Id;
    }

    public function getIp(){
        return $this->Ip;
    }

    public function getFecha(){
        return $this->Fecha;
    }

    public function getActividad(){
        return $this->Actividad;
    }

}
?>