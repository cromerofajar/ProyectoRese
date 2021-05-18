<?php
namespace Modelo;
require_once(dirname(__FILE__).'/../componentes/resenasDB.php');
abstract class OJuegos{
    public $titulo;
    public $genero;

    public abstract static function getClass();
    public abstract static function crearObjetoJuego($arrayJuego);
    public abstract function anadir();
    public abstract static function eliminar($titulo);
}
?>