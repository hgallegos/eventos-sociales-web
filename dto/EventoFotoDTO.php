<?php
/**
 * Created by Mat-PHP-DTO-CREATOR.
 * User: matias_venegas
 * Date: 05-05-2017
 * Time: 19:12
 */

Class EventoFotoDTO{
    private $Id;
    private $Evento_Id;
    private $Titulo;
    private $Descripcion;
    private $Url;

    public function __construct(){
    }

    public function setId($Id){
        $this->Id = $Id;
    }

    public function setEventoId($Evento_Id){
        $this->Evento_Id = $Evento_Id;
    }

    public function setTitulo($Titulo){
        $this->Titulo = $Titulo;
    }

    public function setDescripcion($Descripcion){
        $this->Descripcion = $Descripcion;
    }

    public function setUrl($Url){
        $this->Url = $Url;
    }

    public function getId(){
        return $this->Id;
    }

    public function getEventoId(){
        return $this->Evento_Id;
    }

    public function getTitulo(){
        return $this->Titulo;
    }

    public function getDescripcion(){
        return $this->Descripcion;
    }

    public function getUrl(){
        return $this->Url;
    }

}
?>