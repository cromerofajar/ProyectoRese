<?php
require_once("resenasDB.php");
if ($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["llamar"])){

    $resenaobte=resenasDB::buscarResenas($_GET["llamar"]);
    echo json_encode(["datos"=>$resenaobte]);
    exit(0);
    

}

if ($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["titulo"]) && isset($_GET["juego"]) && isset($_GET["resena"])){
    $resultado=resenasDB::crearResena($_GET["titulo"],$_GET["juego"],$_GET["resena"],$_COOKIE["Usuario"]);
    echo json_encode($resultado);
    exit(0);
}

if ($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["nuevo"])){
    $resultado=resenasDB::anadirJuegos($_GET["nuevo"]);
    echo json_encode($resultado);
    exit(0);
    
}

if ($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["cargar"])){
    $resultado=resenasDB::cargarJuegos();
    echo json_encode($resultado);
    exit(0);
    
}
if ($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["buscar"])){
    $resultado=resenasDB::buscarResenas();
    echo json_encode($resultado);
    exit(0);
    
}
if ($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["juego"]) && isset($_GET["nuevoNJ"])){
    $resultado=resenasDB::modificarJuego($_GET["juego"],$_GET["nuevoNJ"]);
    echo json_encode($resultado);
    exit(0);
}
if ($_SERVER["REQUEST_METHOD"]=="GET" &&isset($_GET["eliminar"])){
    $resultado=resenasDB::eliminarJuego($_GET["eliminar"]);
    echo json_encode($resultado);
}
if ($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["eliminarRese"])){
    $resultado=resenasDB::eliminarResena($_GET["eliminarRese"]);
    echo json_encode($resultado);
}

?>