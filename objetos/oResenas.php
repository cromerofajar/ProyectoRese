<?php
namespace Modelo;
require_once('../componentes/resenasBD.php');
abstract class OResenas  implements resenaszBD {
    public $juego;
    public $titulo;
    public $resena;
    public $usuario;
    public $tipo;

    
    public abstract function anadir();
    public abstract static function eliminar($titulo);
    public abstract static function crearObjetoResena($arrayResena);
}
?>