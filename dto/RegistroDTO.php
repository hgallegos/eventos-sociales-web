<?php
/**
 * Created by Mat-PHP-DTO-CREATOR.
 * User: matias_venegas
 * Date: 07-05-2017
 * Time: 23:22
 */

Class RegistroDTO{
    private $id;
    private $userId;
    private $apiId;
    private $ip;
    private $fecha;
    private $actividad;

    public function __construct(){
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setUserId($userId){
        $this->userId = $userId;
    }

    public function setApiId($apiId){
        $this->apiId = $apiId;
    }

    public function setIp($ip){
        $this->ip = $ip;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function setActividad($actividad){
        $this->actividad = $actividad;
    }

    public function getId(){
        return $this->id;
    }

    public function getUserId(){
        return $this->userId;
    }

    public function getApiId(){
        return $this->apiId;
    }

    public function getIp(){
        return $this->ip;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getActividad(){
        return $this->actividad;
    }

}
?>