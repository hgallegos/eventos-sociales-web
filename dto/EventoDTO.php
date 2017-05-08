<?php
/**
 * Created by Mat-PHP-DTO-CREATOR.
 * User: matias_venegas
 * Date: 07-05-2017
 * Time: 23:13
 */
require_once (ROOT . '/dto/EventoFotoDTO.php');
Class EventoDTO{
    private $id;
    private $userId;
    private $categoriaId;
    private $nombre;
    private $descripcion;
    private $fechaRegistro;
    private $fechaInicio;
    private $fechaFin;
    private $visibilidad;
    private $pNombre;
    private $pDireccion;
    private $pLat;
    private $pLng;
    private $pTipo;
    private $eventoFoto;
    private $listaInvitado;

    public function __construct(){
    }

    /**
     * @return mixed
     */
    public function getListaInvitado()
    {
        return $this->listaInvitado;
    }

    /**
     * @param mixed $listaInvitado
     */
    public function setListaInvitado($listaInvitado)
    {
        $this->listaInvitado = $listaInvitado;
    }
    /**
     * @return mixed
     */



    public function getEventoFoto()
    {
        return $this->eventoFoto;
    }

    /**
     * @param mixed $EventoFoto
     */
    public function setEventoFoto($EventoFoto){

        $this->eventoFoto = $EventoFoto;
    }

    public function addEventoFoto($elemento){
        $this->eventoFoto[] = $elemento;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setUserId($userId){
        $this->userId = $userId;
    }

    public function setCategoriaId($categoriaId){
        $this->categoriaId = $categoriaId;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function setFechaRegistro($fechaRegistro){
        $this->fechaRegistro = $fechaRegistro;
    }

    public function setFechaInicio($fechaInicio){
        $this->fechaInicio = $fechaInicio;
    }

    public function setFechaFin($fechaFin){
        $this->fechaFin = $fechaFin;
    }

    public function setVisibilidad($visibilidad){
        $this->visibilidad = $visibilidad;
    }

    public function setPNombre($pNombre){
        $this->pNombre = $pNombre;
    }

    public function setPDireccion($pDireccion){
        $this->pDireccion = $pDireccion;
    }

    public function setPLat($pLat){
        $this->pLat = $pLat;
    }

    public function setPLng($pLng){
        $this->pLng = $pLng;
    }

    public function setPTipo($pTipo){
        $this->pTipo = $pTipo;
    }

    public function getId(){
        return $this->id;
    }

    public function getUserId(){
        return $this->userId;
    }

    public function getCategoriaId(){
        return $this->categoriaId;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getFechaRegistro(){
        return $this->fechaRegistro;
    }

    public function getFechaInicio(){
        return $this->fechaInicio;
    }

    public function getFechaFin(){
        return $this->fechaFin;
    }

    public function getVisibilidad(){
        return $this->visibilidad;
    }

    public function getPNombre(){
        return $this->pNombre;
    }

    public function getPDireccion(){
        return $this->pDireccion;
    }

    public function getPLat(){
        return $this->pLat;
    }

    public function getPLng(){
        return $this->pLng;
    }

    public function getPTipo(){
        return $this->pTipo;
    }

}
?>