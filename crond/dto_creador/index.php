<?php
/**
 * Created by PhpStorm.
 * User: matiasvenegas
 * Date: 05-05-2017
 * Time: 11:18
 */
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$host = '192.95.15.158';
$user = 'root';
$pass = '6YdsEW0dc4';
$db = 'service_app';

$MySQL = new mysqli($host, $user, $pass, $db);
mysqli_query($MySQL, "SET NAMES 'utf8'");

if (isset($_GET['tabla'])) {

    ?>
    <prev>
        /**<br/>
        * Created by Mat-PHP-DTO-CREATOR.<br/>
        * User: matias_venegas<br/>
        * Date: <?= date("d-m-Y") ?><br/>
        * Time: <?= date("H:i") ?><br/>
        */
    </prev>
    <br/>
    <br/>
    <?php
    echo 'Class ' . generaNombre($_GET['tabla']) . 'DTO{<br />';
    $check = $MySQL->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '" . $_GET['tabla'] . "'");
    while ($row = $check->fetch_object()) {
        $dato0[] = $row->COLUMN_NAME;
    }

    ?>
    <?php
    for ($j = 0; $j < sizeof($dato0); $j++) {
        echo 'private $' . $dato0[$j] . ';<br />';
    }
    ?><br/>
    public function __construct(){<br/>
    }<br/><br/>

    <?php
    for ($j = 0; $j < sizeof($dato0); $j++) {
        echo 'public function set' . generaNombre($dato0[$j]) . '($' . $dato0[$j] . '){<br />';
        echo '$this->' . $dato0[$j] . ' = $' . $dato0[$j] . ';<br />';
        echo '}<br /><br />';
    }
    for ($j = 0; $j < sizeof($dato0); $j++) {
        echo 'public function get' . generaNombre($dato0[$j]) . '(){<br />';
        echo 'return $this->' . $dato0[$j] . ';<br />';
        echo '}<br /><br />';
    }
    ?>
    <?php
    echo '}<br />';
    echo '?>';
}

function generaNombre($data)
{
    $return = '';
    $aux = explode("_", $data);
    for ($i = 0; $i < sizeof($aux); $i++) {
        $return .= ucfirst(strtolower($aux[$i]));
    }
    return $return;
}

?>