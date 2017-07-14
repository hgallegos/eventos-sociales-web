<?php
/**
 * Created by PhpStorm.
 * User: GM-Ta
 * Date: 07-05-2017
 * Time: 18:54
 */
require_once (ROOT . '/utilidades/GetData.php');
Class EventoService{


    private $params;
    private $cache;

    public function __construct($params){
        $this->params = $params;
        if(false) {
            $this->params = new UrlParams();
        }

    }


    private function capturaWebCategoria(){
        ob_start();
//        $data = $this->getEventoUno($this->params->getId());
//        if($data->getDiePage()){
//            $msg = $data->getStatus();
//            error_reporting(0);
//            require_once (ROOT . '/resources/templates/pages/404.php');
//        }else {
//            $data = $data->getContent();
//            $this->cache = $data;
            require_once(ROOT . '/resources/templates/pages/categoria_admin.php');
//        }
        return ob_get_clean();
    }

    public function ConstructorWebCategoria(){
        return $this->capturaWebCategoria();
    }

    private function capturaWebGestion(){
        ob_start();
//        $data = $this->getEventoUno($this->params->getId());
//        if($data->getDiePage()){
//            $msg = $data->getStatus();
//            error_reporting(0);
//            require_once (ROOT . '/resources/templates/pages/404.php');
//        }else {
//            $data = $data->getContent();
//            $this->cache = $data;
        require_once(ROOT . '/resources/templates/pages/evento_admin.php');
//        }
        return ob_get_clean();
    }

    public function ConstructorWebGestion(){
        return $this->capturaWebGestion();
    }

    public function capturaScriptGestion(){
        ob_start();
//        $evento = $this->cache->getContent()->_embedded->eventos;
//        $evento_page = $this->cache->getContent()->page; //totalElements
        require_once(ROOT . '/resources/templates/scripts/evento_admin.php');
        return ob_get_clean();
    }


    public function capturaScriptCategoria(){
        ob_start();
//        $evento = $this->cache->getContent()->_embedded->eventos;
//        $evento_page = $this->cache->getContent()->page; //totalElements
        require_once(ROOT . '/resources/templates/scripts/categoria_admin.php');
        return ob_get_clean();
    }



    private function getEvento(){
        $instrucciones = new GlobalParams();
        if(isset($_POST['evento'])||isset($_POST['lugar'])||isset($_POST['categoria'])) {
            $_SESSION['cacheEvento'] = $_POST['evento'];
            $_SESSION['cacheLugar'] = $_POST['lugar'];
            $_SESSION['cacheCategoria'] = $_POST['categoria'];
            $filtro = 'nombreODireccion';
            $custom =
                'direccion=' . urlencode($_POST['lugar']) .
                '&nombre=' . urlencode($_POST['evento']);
            if($_POST['categoria'] != -1) {
                $filtro = 'filterBy';
                $custom .= '&categoria=' . urldecode($_POST['categoria']);
            }
            $instrucciones->setUrl(SERVICE . '/eventos/search/' . $filtro);
            $instrucciones->setCustom($custom);
        }elseif(isset($_SESSION['cacheEvento']) && isset($_SESSION['cacheLugar']) && isset($_SESSION['cacheCategoria'])) {
            $filtro = 'nombreODireccion';
            $custom =
                'direccion=' . urlencode($_SESSION['cacheLugar']) .
                '&nombre=' . urlencode($_SESSION['cacheEvento']);
            if($_SESSION['cacheCategoria'] != -1) {
                $filtro = 'filterBy';
                $custom .= '&categoria=' . urldecode($_SESSION['cacheCategoria']);
            }
            $instrucciones->setUrl(SERVICE . '/eventos/search/' . $filtro);
            $instrucciones->setCustom($custom);
        }else{
            $instrucciones->setUrl(SERVICE . '/eventos');
        }
        $instrucciones->setSize("20");

        if($this->params->getList() > 0){
            $instrucciones->setPage($this->params->getList());
        }

        $data = getData($instrucciones);
        return $data;
    }

    private function obtieneCategorias($id){
        $db = $this->makeSQL();
        if(!$stmt = $db->prepare("SELECT B.nombre AS nombre FROM asigna_categoria AS A JOIN evento_categoria AS B ON (A.Id_Categoria = B.Id) WHERE A.Id_Evento = ?")){
            echo $db->error;
            die;
        }
        $stmt->bind_param('s',$id);
        $stmt->execute();
        $resutl = $stmt->get_result();
        $i = 0;
        $data = '';
        while($row = $resutl->fetch_assoc()){
            if($i == 0){
                $data = $row['nombre'];
            }else{
                $data .= ', ' . $row['nombre'];
            }
            $i++;
        }
        return $data;
    }

    private function makeSQL(){
        if(!$mysql = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME)){
            http_response_code(406);
            die;
        }
        mysqli_query($mysql, "SET NAMES 'utf8'");
        return $mysql;
    }

    private function getEventoUno($id){
        $instrucciones = new GlobalParams();
        $instrucciones->setUrl(SERVICE . '/eventos/' . $id);

        $data = getData($instrucciones);
        return $data;
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

    public function ConstructorWebNuevo(){
        return $this->capturaWebEventoNuevo();
    }

    public function ConstructorWebEvento(){
        return $this->capturaWebEvento();
    }

    private function nextPage($page){
        if($this->params->getList() +1 < $page->totalPages){
            return 'index.php?page=evento&list=' . ($this->params->getList() + 1) ;
        }
        return '#';
    }

    private function backPage(){
        if($this->params->getList() > 0){
            return 'index.php?page=evento&list=' . ($this->params->getList() - 1) ;
        }
        return '#';
    }

    private function getFotos($fotos_url){
        $instrucciones = new GlobalParams();
        $instrucciones->setUrl($fotos_url);

        $data = getData($instrucciones);
        $foto = $data->getContent();
        $foto = $foto->_embedded->evento_fotos;
        return $foto;
    }

    private function capturaWebEvento(){
        ob_start();
        $data = $this->getEventoUno($this->params->getId());
        if($data->getDiePage()){
            $msg = $data->getStatus();
            error_reporting(0);
            require_once (ROOT . '/resources/templates/pages/404.php');
        }else {
            $data = $data->getContent();
            $fotos = $data->_links->eventoFotos->href;
            $fotos = $this->getFotos($fotos);
            $this->cache = $data;
            require_once(ROOT . '/resources/templates/pages/ver_evento.php');
        }
        return ob_get_clean();
    }

    private function capturaWebEventoNuevo(){
        ob_start();
        $categoria_array = $this->getCategoria();
        $categoria = $categoria_array->getContent()->_embedded->evento_categorias;
        $categoria_tamanio = $categoria_array->getContent()->page->totalElements;
        require_once(ROOT . '/resources/templates/pages/nuevo_evento.php');
        return ob_get_clean();
    }

    private function getCategoriaICONS($id){
        $arr = json_decode(CATEGORIA);
        foreach ($arr as $key => $value){
            if($key == $id){
                return $value;
            }
        }
        return $arr->DEFAULT;
    }

    private function quitaSimbolos($string){
        $string = str_replace("'", '&#39;', $string);
        $string = str_replace('"', '&#34;', $string);
        return $string;
    }


    private function capturaWeb(){
        //error_reporting(E_ERROR | E_WARNING | E_PARSE);
        ob_start();
        //Iniciadores de contenido
        $categoria_array = $this->getCategoria();
        $categoria = $categoria_array->getContent()->_embedded->evento_categorias;
        $categoria_tamanio = $categoria_array->getContent()->page->totalElements;
        $evento_array = $this->getEvento();
        $this->cache = $evento_array;
        $evento = $evento_array->getContent()->_embedded->eventos;
        $evento_page = $evento_array->getContent()->page; //totalElements

        if($categoria_array->getDiePage() || $evento_array->getDiePage()){
            $msg = $categoria_array->getStatus() || $evento_array->getStatus();
            error_reporting(0);
            require_once (ROOT . '/resources/templates/pages/404.php');
        }else {
            require_once(ROOT . '/resources/templates/pages/evento_lista.php');
        }
        return ob_get_clean();
    }

    public function capturaScriptNuevo(){
        ob_start();
        require_once(ROOT . '/resources/templates/scripts/nuevo_evento.php');
        return ob_get_clean();
    }

    public function capturaScript(){
        ob_start();
        $evento = $this->cache->getContent()->_embedded->eventos;
        $evento_page = $this->cache->getContent()->page; //totalElements
        require_once(ROOT . '/resources/templates/scripts/evento_lista.php');
        return ob_get_clean();
    }

    public function capturaScriptVer(){
        ob_start();
        $data = $this->cache;
        require_once(ROOT . '/resources/templates/scripts/ver_evento.php');
        return ob_get_clean();
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

}
?>