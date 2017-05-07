<?php
/**
 * Created by Mat-PHP-DTO-CREATOR.
 * User: matias_venegas
 * Date: 07-05-2017
 * Time: 23:20
 */

Class EventoFotoDTO{
    private $id;
    private $eventoId;
    private $titulo;
    private $descripcion;
    private $url;

    public function __construct(){
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setEventoId($eventoId){
        $this->eventoId = $eventoId;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function setUrl($url){
        $this->url = $url;
    }

    public function getId(){
        return $this->id;
    }

    public function getEventoId(){
        return $this->eventoId;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getUrl(){
        return $this->url;
    }

}
?>