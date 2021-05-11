<?php
require_once('resenas.php');
class ResenasDB extends Resenas
{
    protected $usuario;
    private static $conexion;
 
    public static function getConexion() {
        if (!isset(self::$conexion)) {
            $cadena_conexion = 'mysql:dbname=datospagina;host=127.0.0.1';
            $usuario = 'root';
            $clave = '';
            self::$conexion = new PDO($cadena_conexion, $usuario, $clave);
        }
        return self::$conexion;
    }

    public static function login($nombre,$contraseña) {
      $datos = false;
      try {
            $sql = "select nombre,clave from usuarios where nombre = :nom && clave = :clave"; 
            $preparada = self::getConexion()->prepare($sql);	
            $preparada->execute( array(':nom'=>$nombre,':clave'=>$contraseña));
            if ($preparada->rowCount() == 1) {
                $datos = $preparada->fetchAll(PDO::FETCH_ASSOC)[0];
                if ($datos['nombre']==$nombre && $datos['clave']==$contraseña) {
                    return true;
                }
            }
        } catch (PDOException $e) {
             throw new Exception('Error con la base de datos: ' . $e->getMessage());
        }
        return $datos;
    }


}