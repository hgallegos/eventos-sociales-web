<?php
/**
 * Created by PhpStorm.
 * User: GM-Ta
 * Date: 07-05-2017
 * Time: 18:54
 */
require_once (ROOT . '/utilidades/GetData.php');
Class InicioService{


    private $params;

    public function __construct($params){
        $this->params = $params;
        if(false) {
            $this->params = new UrlParams();
        }

    }

    private function getCategoria(){
        $instrucciones = new GlobalParams();
        $instrucciones->setUrl(SERVICE . '/evento_categorias');
        $instrucciones->setSize("1000");

        $data = getData($instrucciones);
        return $data;
    }

    public function ConstructorWeb(){

        return $this->capturaWeb();


    }

    private function getCategoriaIMG($id){
        $arr = json_decode(CATEGORIA);
        foreach ($arr as $key => $value){
            if($key == $id){
                return $value;
            }
        }
        return $arr->DEFAULT;
    }

    private function obtieneDatosUsuario($mysql)
    {
        $stmt = $mysql->prepare("SELECT
	A.cantidad AS google,
	B.cantidad AS facebook,
	C.cantidad AS registro
FROM
	(SELECT COUNT(*) AS cantidad FROM usuario WHERE Token = 'Google') AS A,
	(SELECT COUNT(*) AS cantidad FROM usuario WHERE Token = 'Facebook') AS B,
	(SELECT COUNT(*) AS cantidad FROM usuario WHERE Token IS NULL) AS C");
        $stmt->execute();
        $resutl = $stmt->get_result();
        $google = 0; $facebook = 0; $registro = 0;
        while($row = $resutl->fetch_assoc()){
            $google = $row['google'];
            $facebook = $row['facebook'];
            $registro = $row['registro'];
        }
        return [$google,$facebook,$registro];
    }

    private function capturaDataActividad($Anio,$Mes,$Tipo,$mysql){
        $stmt = $mysql->prepare("SELECT COUNT(*) AS cantidad FROM actividad WHERE YEAR(Fecha) = ? AND MONTH(Fecha) = ? AND Tipo = ?");
        $stmt->bind_param("sss",$Anio,$Mes,$Tipo);
        $stmt->execute();
        $resutl = $stmt->get_result();
        $cantidad = 0;
        while($row = $resutl->fetch_assoc()){
            $cantidad = $row['cantidad'];
        }
        return $cantidad;
    }

    private function obieneDatosActividad($mysql){
        $crear = $this->capturaDataActividad(2017,5,'crear_evento',$mysql) . ',' .
            $this->capturaDataActividad(2017,6,'crear_evento',$mysql) . ',' .
            $this->capturaDataActividad(2017,7,'crear_evento',$mysql) . ',' .
            $this->capturaDataActividad(2017,8,'crear_evento',$mysql);
        $eliminar = $this->capturaDataActividad(2017,5,'eliminar_evento',$mysql) . ',' .
            $this->capturaDataActividad(2017,6,'eliminar_evento',$mysql) . ',' .
            $this->capturaDataActividad(2017,7,'eliminar_evento',$mysql) . ',' .
            $this->capturaDataActividad(2017,8,'eliminar_evento',$mysql);
        $modificar = $this->capturaDataActividad(2017,5,'modificar_evento',$mysql) . ',' .
            $this->capturaDataActividad(2017,6,'modificar_evento',$mysql) . ',' .
            $this->capturaDataActividad(2017,7,'modificar_evento',$mysql) . ',' .
            $this->capturaDataActividad(2017,8,'modificar_evento',$mysql);
        return [$crear,$eliminar,$modificar];
    }

    private function makeSQL(){
        if(!$mysql = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME)){
            http_response_code(406);
            die;
        }
        mysqli_query($mysql, "SET NAMES 'utf8'");
        return $mysql;
    }

    public function ConstructorWebInicioAdmin(){
        ob_start();
        require_once(ROOT . '/resources/templates/pages/inicio_admin.php');
        return ob_get_clean();
    }
    public function capturaScriptInicioAdmin(){
        $mysql = $this->makeSQL();
        ob_start();
        $usuarios = $this->obtieneDatosUsuario($mysql);
        $actividad = $this->obieneDatosActividad($mysql);
        require_once(ROOT . '/resources/templates/scripts/inicio_admin.php');
        return ob_get_clean();
    }

    private function capturaWeb(){
        ob_start();
        $categoria_array = $this->getCategoria();
        $categoria = $categoria_array->getContent()->_embedded->evento_categorias;
        $categoria_tamanio = $categoria_array->getContent()->page->totalElements;
        if($categoria_array->getDiePage()){
            $msg = $categoria_array->getStatus();
            error_reporting(0);
            require_once (ROOT . '/resources/templates/pages/404.php');
        }else {
            require_once(ROOT . '/resources/templates/pages/inicio.php');
        }
        return ob_get_clean();
    }

    private function capturaWebMDU(){
        ob_start();
        require_once(ROOT . '/resources/templates/pages/mododeuso.php');
        return ob_get_clean();
    }

    public function ConstructorWebContacto(){
        ob_start();
        require_once(ROOT . '/resources/templates/pages/contacto.php');
        return ob_get_clean();
    }

    public function ConstructorWebMDU(){
        return $this->capturaWebMDU();
    }

}
?>