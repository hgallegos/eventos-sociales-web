<?php
/**
 * Created by Mat-PHP-DTO-CREATOR.
 * User: matias_venegas
 * Date: 05-05-2017
 * Time: 19:10
 */

Class ListaInvitadoDTO{
    private $Id;
    private $Evento_Id;
    private $User_Id;

    public function __construct(){
    }

    public function setId($Id){
        $this->Id = $Id;
    }

    public function setEventoId($Evento_Id){
        $this->Evento_Id = $Evento_Id;
    }

    public function setUserId($User_Id){
        $this->User_Id = $User_Id;
    }

    public function getId(){
        return $this->Id;
    }

    public function getEventoId(){
        return $this->Evento_Id;
    }

    public function getUserId(){
        return $this->User_Id;
    }

}
?>