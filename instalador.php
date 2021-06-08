<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_password = "";

$db = new PDO("mysql:host=$mysql_host", $mysql_user, $mysql_password);

$query = file_get_contents("crfdatospagina.sql");

$stmt = $db->prepare($query);

if ($stmt->execute()){
     header("location:index.php");
}else{ 
     echo "Fail";
}
?>