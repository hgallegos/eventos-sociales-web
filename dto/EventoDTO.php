<?php
/**
 * Created by Mat-PHP-DTO-CREATOR.
 * User: matias_venegas
 * Date: 05-05-2017
 * Time: 19:14
 */

require_once (ROOT . '/dto/EventoFotoDTO.php');

Class EventoDTO{
    private $Id;
    private $User_Id;
    private $Categoria_Id;
    private $Nombre;
    private $Descripcion;
    private $Fecha_Registro;
    private $Fecha_Inicio;
    private $Fecha_Fin;
    private $Visibilidad;
    private $P_Nombre;
    private $P_Direccion;
    private $P_Lat;
    private $P_Lng;
    private $P_Tipo;
    private $EventoFoto;

    public function __construct(){
    }

    /**
     * @return mixed
     */
    public function getEventoFoto()
    {
        return $this->EventoFoto;
    }

    /**
     * @param mixed $EventoFoto
     */
    public function setEventoFoto($EventoFoto){

        $this->EventoFotoDTO = $EventoFoto;
    }



    public function setId($Id){
        $this->Id = $Id;
    }

    public function setUserId($User_Id){
        $this->User_Id = $User_Id;
    }

    public function setCategoriaId($Categoria_Id){
        $this->Categoria_Id = $Categoria_Id;
    }

    public function setNombre($Nombre){
        $this->Nombre = $Nombre;
    }

    public function setDescripcion($Descripcion){
        $this->Descripcion = $Descripcion;
    }

    public function setFechaRegistro($Fecha_Registro){
        $this->Fecha_Registro = $Fecha_Registro;
    }

    public function setFechaInicio($Fecha_Inicio){
        $this->Fecha_Inicio = $Fecha_Inicio;
    }

    public function setFechaFin($Fecha_Fin){
        $this->Fecha_Fin = $Fecha_Fin;
    }

    public function setVisibilidad($Visibilidad){
        $this->Visibilidad = $Visibilidad;
    }

    public function setPNombre($P_Nombre){
        $this->P_Nombre = $P_Nombre;
    }

    public function setPDireccion($P_Direccion){
        $this->P_Direccion = $P_Direccion;
    }

    public function setPLat($P_Lat){
        $this->P_Lat = $P_Lat;
    }

    public function setPLng($P_Lng){
        $this->P_Lng = $P_Lng;
    }

    public function setPTipo($P_Tipo){
        $this->P_Tipo = $P_Tipo;
    }

    public function getId(){
        return $this->Id;
    }

    public function getUserId(){
        return $this->User_Id;
    }

    public function getCategoriaId(){
        return $this->Categoria_Id;
    }

    public function getNombre(){
        return $this->Nombre;
    }

    public function getDescripcion(){
        return $this->Descripcion;
    }

    public function getFechaRegistro(){
        return $this->Fecha_Registro;
    }

    public function getFechaInicio(){
        return $this->Fecha_Inicio;
    }

    public function getFechaFin(){
        return $this->Fecha_Fin;
    }

    public function getVisibilidad(){
        return $this->Visibilidad;
    }

    public function getPNombre(){
        return $this->P_Nombre;
    }

    public function getPDireccion(){
        return $this->P_Direccion;
    }

    public function getPLat(){
        return $this->P_Lat;
    }

    public function getPLng(){
        return $this->P_Lng;
    }

    public function getPTipo(){
        return $this->P_Tipo;
    }

}
?>