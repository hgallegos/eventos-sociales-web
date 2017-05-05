<?php
/**
 * Created by Mat-PHP-DTO-CREATOR.
 * User: matias_venegas
 * Date: 05-05-2017
 * Time: 19:13
 */

Class EventoCategoriaDTO{
    private $Id;
    private $Nombre;
    private $Descripcion;

    public function __construct(){
    }

    public function setId($Id){
        $this->Id = $Id;
    }

    public function setNombre($Nombre){
        $this->Nombre = $Nombre;
    }

    public function setDescripcion($Descripcion){
        $this->Descripcion = $Descripcion;
    }

    public function getId(){
        return $this->Id;
    }

    public function getNombre(){
        return $this->Nombre;
    }

    public function getDescripcion(){
        return $this->Descripcion;
    }

}
?>