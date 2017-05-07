<?php
/**
 * Created by Mat-PHP-DTO-CREATOR.
 * User: matias_venegas
 * Date: 07-05-2017
 * Time: 23:22
 */

Class PosicionDTO{
    private $id;
    private $userId;
    private $fecha;
    private $nombre;
    private $direccion;
    private $lat;
    private $lng;
    private $tipo;
    private $defecto;

    public function __construct(){
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setUserId($userId){
        $this->userId = $userId;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function setLat($lat){
        $this->lat = $lat;
    }

    public function setLng($lng){
        $this->lng = $lng;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function setDefecto($defecto){
        $this->defecto = $defecto;
    }

    public function getId(){
        return $this->id;
    }

    public function getUserId(){
        return $this->userId;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getLat(){
        return $this->lat;
    }

    public function getLng(){
        return $this->lng;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function getDefecto(){
        return $this->defecto;
    }

}
?>