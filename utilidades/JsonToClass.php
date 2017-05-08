<?php
/**
 * Created by PhpStorm.
 * User: matiasvenegas
 * Date: 08-05-2017
 * Time: 10:54
 */
require_once (ROOT . '/resources/params/InternalStatus.php');
require_once (ROOT . '/utilidades/TextFormant.php');
function JsonToClass($internal){
    $respond = new internalStatus();
    if(false){
        $internal = new internalStatus();
    }
    $nEntidad = generaVarEntidad($internal->getContentName());
    $contenido = $internal->getContent();
    if (!file_exists(ROOT . '/dto/'. $nEntidad . '.php')) {
        $respond->setStatus("No existe la entidad " . $nEntidad);
        $respond->setDiePage(true);
        return $respond;
    }
    require_once (ROOT . '/dto/' . $nEntidad . '.php');
    //var_dump($contenido);
    $New = null;
    for($i = 0; $i<sizeof($contenido); $i++) {
        $New[$i] = new $nEntidad();
        foreach ($contenido[$i] as $key => $val) {
            //echo $key . ' => ' . $val . '<br />';
            $col = 'set' . generaVarEntidad($key);
            //echo $col . '<br />';
            if(is_array($val)){
                $Rec = new internalStatus();
                $Rec->setContentName(eliminaS($key) . 'DTO');
                $Rec->setContent($val);
                $val = JsonToClass($Rec);
                $col = eliminaS($col);
            }
            if(method_exists($New[$i],$col)) {
                $New[$i]->$col($val);
            }
        }
    }
    return $New;

}
?>