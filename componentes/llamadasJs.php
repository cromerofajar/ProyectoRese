<?php
require_once("resenasDB.php");
if ($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["llamar"])){

    $resenaobte=resenasDB::buscarResenas($_GET["llamar"]);
    echo json_encode(["datos"=>$resenaobte]);
    
    

}
?>