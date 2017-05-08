<?php
/**
 * Created by PhpStorm.
 * User: matiasvenegas
 * Date: 08-05-2017
 * Time: 11:14
 */
function generaNombre($data)
{
    $return = '';
    $aux = explode("_", $data);
    for ($i = 0; $i < sizeof($aux); $i++) {
        $return .= ucfirst(strtolower($aux[$i]));
    }
    return $return;
}

function generaVarNombre($data){
    return lcfirst(generaNombre($data));
}

function generaVarEntidad($data){
    if(strpos($data, '_') !== false){
        return generaNombre($data);
    }else{
        return ucfirst($data);
    }
}

function eliminaS($data){
    if(substr($data, -1)){
        return substr($data, 0, -1);
    }

}
?>