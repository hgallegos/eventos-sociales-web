<?php
/**
 * Created by PhpStorm.
 * User: matiasvenegas
 * Date: 08-05-2017
 * Time: 12:26
 */
class UrlParams{

    private $page;
    private $fMode;

    public function __construct(){
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


}
?>