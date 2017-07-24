<?php
/**
 * Created by PhpStorm.
 * User: GM-Ta
 * Date: 23-07-2017
 * Time: 16:23
 */
class InicioServiceFunction{

    private $params;
    private $cache;

    public function __construct($params)
    {
        $this->params = $params;
        if (false) {
            $this->params = new UrlParams();
        }

    }


}
?>