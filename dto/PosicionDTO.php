<?php
/**
 * Created by Mat-PHP-DTO-CREATOR.
 * User: matias_venegas
 * Date: 05-05-2017
 * Time: 17:53
 */

Class PosicionDTO{
    private $Id;
    private $User_Id;
    private $Fecha;
    private $Nombre;
    private $Direccion;
    private $Lat;
    private $Lng;
    private $Tipo;
    private $Defecto;

    public function __construct(){
    }

    public function setId($Id){
        $this->Id = $Id;
    }

    public function setUser_id($User_Id){
        $this->User_Id = $User_Id;
    }

    public function setFecha($Fecha){
        $this->Fecha = $Fecha;
    }

    public function setNombre($Nombre){
        $this->Nombre = $Nombre;
    }

    public function setDireccion($Direccion){
        $this->Direccion = $Direccion;
    }

    public function setLat($Lat){
        $this->Lat = $Lat;
    }

    public function setLng($Lng){
        $this->Lng = $Lng;
    }

    public function setTipo($Tipo){
        $this->Tipo = $Tipo;
    }

    public function setDefecto($Defecto){
        $this->Defecto = $Defecto;
    }

    public function getId(){
        return $this->Id;
    }

    public function getUser_id(){
        return $this->User_Id;
    }

    public function getFecha(){
        return $this->Fecha;
    }

    public function getNombre(){
        return $this->Nombre;
    }

    public function getDireccion(){
        return $this->Direccion;
    }

    public function getLat(){
        return $this->Lat;
    }

    public function getLng(){
        return $this->Lng;
    }

    public function getTipo(){
        return $this->Tipo;
    }

    public function getDefecto(){
        return $this->Defecto;
    }

}
?>