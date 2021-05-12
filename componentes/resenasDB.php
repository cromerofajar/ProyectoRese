<?php
require_once('resenas.php');
class ResenasDB extends Resenas
{
    protected $usuario;
    private static $conexion;
    private static $generoSelct;
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


    public static function cargarGeneros(){
        $generos=[];
        try{
            $sql = "select genero,codigo from generos";
            $preparada=self::getConexion()->prepare($sql);
            $preparada->execute();
            if($preparada->rowCount()>0){
                foreach($preparada as $dato){
                    array_push($generos,$dato);
                }
            }
        } catch (PDOException $e) {
            throw new Exception('Error con la base de datos: ' . $e->getMessage());
        }
        return $generos;
    }

    private function mostrarJuegos($juegos){
        foreach($juegos as $mostrar){
            $mostrar="<button class='btn btn-block' type='button'>".$juego."</button>";
            echo $mostrar;
        }
    }

    public function buscarJuegos($codigo){
        $juegos;
        try{
            $sql="select titulo from juegos where genero=".$codigo;
            $preparada=self::getConexion()->prepare($sql);
            $preparada->execute();
            if($preparada->rowCount()>0){
                foreach($preparada as $juego){
                    array_push($juegos, $juego);
                }
            }
        } catch (PDOException $e) {
            throw new Exception('Error con la base de datos: ' . $e->getMessage());
        }
        self::mostrarJuegos($juegos);
    }

    public static function generarHtml(){
        $generos=self::cargarGeneros();
        foreach($generos as $dato){
            $campos="<button class='btn btn-block' type='button' id=".$dato[1]." onclick=''>".$dato[0]."</button>";
            echo $campos;
        }
    }
}
