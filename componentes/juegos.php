<?php
require_once("resenasDB.php");
require_once(dirname(__FILE__).'/../objetos/oJuegos.php');
class Juegos extends Modelo\OJuegos {
    
    public static function getClass() {
        return get_called_class();
    }

    public static function crearObjetoJuego($arrayJuego){
        echo $arrayJuego['titulo'];
        /*
        $tipo = get_called_class();
        $jue = new $tipo();
        $jue->titulo = $arrayJuego['titulo'];
        $jue->genero = $arrayJuego['genero'];
        return $jue;
        */
    }

    public function anadir(){
        //$sql="INSERT INTO resenas(juego, titulo, resena, usuario, tipo) VALUES (:juego,:titulo,:resena,:usuario,:tipo)";

    }
    
    public static function eliminar($titulo){
        //Por hacer
    }

}