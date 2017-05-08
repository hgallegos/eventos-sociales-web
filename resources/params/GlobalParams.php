<?php
/**
 * Created by PhpStorm.
 * User: GM-Ta
 * Date: 07-05-2017
 * Time: 18:27
 */
class GlobalParams{
    private $url;
    private $page;
    private $size;
    private $sort;
    private $id;
    private $object;

    private $procesing;

    public function __construct(){
    }

    private function AllURL(){
        $this->procesing = "";
        if($this->page != null){
            $this->procesing = "page=" . $this->page;
        }
        if($this->size != null){
            if($this->procesing != ""){
                $this->procesing .= "&size=" . $this->size;
            }else{
                $this->procesing .= "size=" . $this->size;
            }
        }
        if($this->sort != null){
            if($this->procesing != ""){
                $this->procesing .= "&sort=" . $this->sort;
            }else{
                $this->procesing .= "sort=" . $this->sort;
            }
        }
        if($this->procesing != ""){
            $this->procesing = "?" . $this->procesing;
        }

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }



    /**
     * @return mixed
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param mixed $object
     */
    public function setObject($object)
    {
        $this->object = $object;
    }



    /**
     * @return mixed
     */
    public function getUrl($type)
    {
        switch ($type){
            case 'All':
                $this->AllURL();
                break;

        }
        return $this->url . $this->procesing;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
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
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param mixed $sort
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
    }


}
?>