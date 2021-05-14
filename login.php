<?php
require_once("componentes/resenasDB.php");

if ($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET['error'])) {
    $mensajeError = $_GET['error'];
}

if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['Salir'])) {
    setcookie('Usuario',null, time()-3600);
    session_start();
    session_unset();
    header('location:index.php');
}

if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['iniciar'])) {

    if (resenasDB::login($_POST['usuario'],$_POST['contra'])) {
        setcookie('Usuario',$_POST['usuario'], time()+3600);
        session_start();
        session_unset();
        header('location:index.php');
        exit(0);
    } else {
        $mensajeError = 'Acceso denegado';
    }

    
}


if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['registrarse'])) {
    if(resenasDB::registrarse($_POST['usuario'],$_POST['contra'])){
        setcookie('Usuario',$_POST['usuario'], time()+3600);
        session_start();
        session_unset();
        header('location:index.php');
        exit(0);
    }
}
include_once("componentes/pestanaslogin.php");