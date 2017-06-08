<?php
/**
 * Created by PhpStorm.
 * User: GM-Ta
 * Date: 07-05-2017
 * Time: 18:54
 */
require_once (ROOT . '/utilidades/JsonReader.php');
require_once (ROOT . '/utilidades/JsonToClass.php');
require_once (ROOT . '/dto/EventoDTO.php');
require_once (ROOT . '/utilidades/ClassToString.php');
Class PerfilService{

    private $params;

    public function __construct($params){
        $this->params = $params;
        if(false) {
            $this->params = new UrlParams();
        }

    }

    public function ConstructorWeb(){

        return $this->capturaWeb();


    }

    private function loginJson(){
        $data = null;
        $data = array(
            'usuario' => 'matgaston',
            'nombre' => 'Matías Gastón Venegas Ibáñez',
            'correo' => 'matiasgaston.vi@gmail.com',
            'password' => '123abc',
            'nivel' => 'USUARIO'
        );
        return $data;
    }

    public function loginSession(){
        $data = $this->loginJson();
        if($data != null){
            $this->params->setUsername($data['usuario']);
            $this->params->setName($data['nombre']);
            $this->params->setMail($data['correo']);
            $this->params->setPassword($data['password']);
            $this->params->setNivel($data['nivel']);
            $this->params->setIsLogged(true);
            $this->params->goHome();
        }else{
            //Error
            return 'error con la el inicio de usuario';
        }

    }

    private function capturaWeb(){
        ob_start();
        require_once (ROOT . '/resources/templates/pages/perfil.php');
        return ob_get_clean();
    }
}
?>