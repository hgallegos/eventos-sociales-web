<?php
/**
 * Created by PhpStorm.
 * User: matiasvenegas
 * Date: 08-05-2017
 * Time: 12:26
 */
class UrlParams{

    private $page;
    private $function;
    private $fMode;
    private $isLogged;
    private $username;
    private $name;
    private $mail;
    private $password;
    private $nivel;

    public function __construct(){
        $this->isLogged = false;
        if(isset($_SESSION['Login'])){
            $this->username = $_SESSION['Persona']->username;
            $this->name = $_SESSION['Persona']->name;
            $this->mail = $_SESSION['Persona']->mail;
            $this->password = $_SESSION['Persona']->password;
            $this->nivel = $_SESSION['Persona']->nivel;
            $this->isLogged = true;
        }
    }

    /**
     * @return mixed
     */
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * @param mixed $function
     */
    public function setFunction($function)
    {
        $this->function = $function;
    }



    /**
     * @return mixed
     */
    public function getFMode()
    {
        return $this->fMode;
    }

    /**
     * @param mixed $fMode
     */
    public function setFMode($fMode)
    {
        $this->fMode = $fMode;
    }



    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param mixed $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @return mixed
     */
    public function getIsLogged()
    {
        return $this->isLogged;
    }

    /**
     * @param mixed $isLogged
     */
    public function setIsLogged($isLogged)
    {
        $_SESSION['Login'] = true;
        $this->isLogged = $isLogged;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $_SESSION['Persona']->username = $username;
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $_SESSION['Persona']->name = $name;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $_SESSION['Persona']->mail = $mail;
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $_SESSION['Persona']->password = $password;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * @param mixed $nivel
     */
    public function setNivel($nivel)
    {
        $_SESSION['Persona']->nivel = $nivel;
        $this->nivel = $nivel;
    }



    public function requireLogin(){
        if(!$this->isLogged){
            header("location:index.php");
            die;
        }
    }

    public function goHome(){
        header("location:index.php");
        die;
    }




}
?>