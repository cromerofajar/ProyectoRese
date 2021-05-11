<?php

abstract class Resenas
{
    private const NOMBRE_SESSION = __FILE__.'usuarioConectado';


    public function __construct($reiniciar=false) {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (isset($_SESSION[Resenas::NOMBRE_SESSION])){
            $this->cargarDatosSesion();
        }

        if ($reiniciar || !isset($_SESSION[Resenas::NOMBRE_SESSION])){
            $this->nuevoJuego();
        }

    }

    protected function cargarDatosSesion() {
        $datos = unserialize($_SESSION[Ahorcado::NOMBRE_SESSION]);
        foreach ($datos as $key => $value) {
           $this->$key = $value;
        }
    }
    protected function guardarDatosSesion() {
        $_SESSION[Ahorcado::NOMBRE_SESSION] = serialize($this);

    }

}