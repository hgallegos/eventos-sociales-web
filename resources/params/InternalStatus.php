<?php
/**
 * Created by PhpStorm.
 * User: GM-Ta
 * Date: 07-05-2017
 * Time: 18:33
 */
class internalStatus{

    private $diePage;
    private $status;
    private $content;

    public function __construct(){
    }

    /**
     * @return mixed
     */
    public function getDiePage()
    {
        return $this->diePage;
    }

    /**
     * @param mixed $diePage
     */
    public function setDiePage($diePage)
    {
        $this->diePage = $diePage;
    }



    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }


}
?>