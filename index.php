<?php
/**
 * Created by PhpStorm.
 * User: matiasvenegas
 * Date: 05-05-2017
 * Time: 11:01
 */
//ob_start();

session_start();

require('config.php');
require(ROOT . '/controller/Controller.php');
$web = new Controller();
echo $web->printWeb();

//ob_end_flush();
?>