<?php
/**
 * Created by Mat-PHP-DTO-CREATOR.
 * User: matias_venegas
 * Date: 07-05-2017
 * Time: 23:21
 */

Class ListaInvitadoDTO{
    private $id;
    private $eventoId;
    private $userId;

    public function __construct(){
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setEventoId($eventoId){
        $this->eventoId = $eventoId;
    }

    public function setUserId($userId){
        $this->userId = $userId;
    }

    public function getId(){
        return $this->id;
    }

    public function getEventoId(){
        return $this->eventoId;
    }

    public function getUserId(){
        return $this->userId;
    }

}
?>