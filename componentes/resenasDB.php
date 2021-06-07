<?php
require_once('resenas.php');
class ResenasDB extends Resenas
{

    private static $conexion;

    public static function getConexion() {
        if (!isset(self::$conexion)) {
            $cadena_conexion = 'mysql:dbname=crfdatospagina;host=127.0.0.1';
            $usuario = 'root';
            $clave = '';
            self::$conexion = new PDO($cadena_conexion, $usuario, $clave);
        }
        return self::$conexion;
    }


    public function mostrarBotonesResenas(){
        $resenas=self::buscarResenas();
        foreach($resenas as $mostrar){
            $mostrar="<button class='btn btn-block' type='button' id='$mostrar[1]'>".$mostrar[0]."</button>";
            echo $mostrar;
        }
    }

    public static function cargarJuegos(){
        $juegos=[];
        try {
            $sql = "select titulo from juegos"; 
            $preparada = ResenasDB::getConexion()->prepare($sql);	
            $preparada->execute();
            if ($preparada->rowCount()> 0) {
                foreach($preparada as $juego){
                    array_push($juegos,$juego["titulo"]);
                }
            }
        } catch (PDOException $e) {
            throw new Exception('Error con la base de datos: ' . $e->getMessage());
        }
        return $juegos;
    }

    public static function modificarJuego($juego,$nuevoNombre){
        $funciono=false;
        try{
            $sql="UPDATE juegos SET titulo =:titulo WHERE titulo = :titu;";
            $preparada = ResenasDB::getConexion()->prepare($sql);	
            $preparada->execute(array(":titulo"=>$nuevoNombre,":titu"=>$juego));
            if($preparada->rowCount()>0){
                $funciono= true;
            }
        } catch (PDOException $e) {
            throw new Exception('Error con la base de datos: ' . $e->getMessage());
        }
        return $funciono;
    }

    public static function eliminarJuego($juego){
        $funciono=false;
        try{
            $sql="DELETE FROM juegos WHERE titulo=:titu;";
            $preparada = ResenasDB::getConexion()->prepare($sql);	
            $preparada->execute(array(":titu"=>$juego));
            if($preparada->rowCount()>0){
                $funciono= true;
            }
        } catch (PDOException $e) {
            throw new Exception('Error con la base de datos: ' . $e->getMessage());
        }
        return $funciono;
    }

    public static function anadirJuegos($titulo){
        $funciono;
        try {
            $sql = "select titulo from juegos where titulo = :titulo"; 
            $preparada = ResenasDB::getConexion()->prepare($sql);	
            $preparada->execute( array(':titulo'=>$titulo));
            if ($preparada->rowCount() == 1) {
                $funciono=false;
            }else{
                $sqlregis="insert into juegos(titulo) values (:titulo)";
                $prepa=ResenasDB::getConexion()->prepare($sqlregis);
                $prepa->execute(array(':titulo'=>$titulo,));
                if($prepa->rowCount()>0){
                    $funciono=true;
                }
            }
        } catch (PDOException $e) {
            throw new Exception('Error con la base de datos: ' . $e->getMessage());
        } 
        return $funciono;
    }
    public static function buscarResenas($id=null){
        $resenas=[];
        if($id!=null){
        try{
            $sql="select juego,titulo,resena,usuario from resenas where id=:iden";
            $preparada=self::getConexion()->prepare($sql);
            $preparada->execute(array(":iden"=>$id));
            if($preparada->rowCount()>0){
                foreach($preparada as $resena){
                    $datos=[];
                    array_push($datos, $resena["juego"]);
                    array_push($datos, $resena["titulo"]);
                    array_push($datos, $resena["resena"]);
                    array_push($datos, $resena["usuario"]);
                    array_push($resenas,$datos);
                    
                }
            }
        } catch (PDOException $e) {
            throw new Exception('Error con la base de datos: ' . $e->getMessage());
        }
        }else{
        try{
            $sql="select titulo,id from resenas";
            $preparada=self::getConexion()->prepare($sql);
            $preparada->execute();
            if($preparada->rowCount()>0){
                foreach($preparada as $resena){
                    $datos=[];
                    array_push($datos, $resena[0]);
                    array_push($datos, $resena[1]);
                    array_push($resenas,$datos);
                }
            }
        } catch (PDOException $e) {
            throw new Exception('Error con la base de datos: ' . $e->getMessage());
        }}
        return $resenas;
    }

    public static function eliminarResena($resena){
        $funciono=false;
        try{
            $sql="DELETE FROM resenas WHERE titulo=:titu;";
            $preparada = ResenasDB::getConexion()->prepare($sql);	
            $preparada->execute(array(":titu"=>$resena));
            if($preparada->rowCount()>0){
                $funciono= true;
            }
        } catch (PDOException $e) {
            throw new Exception('Error con la base de datos: ' . $e->getMessage());
        }
        return $funciono;
    }
    public static function crearResena($titulo,$juego,$resena,$persona){
        $funciono=false;
        try {
            $sqlregis="insert into resenas(juego,titulo,resena,usuario,id) values (:juego,:titulo,:resena,:usuario,:id)";
            $prepa=ResenasDB::getConexion()->prepare($sqlregis);
            $prepa->execute(array(':juego'=>$juego,':titulo'=>$titulo,':resena'=>$resena,':usuario'=>$persona,':id'=>null));
            if($prepa->rowCount()>0){
                $funciono=true;
            }
        } catch (PDOException $e) {
            throw new Exception('Error con la base de datos: ' . $e->getMessage());
        }
        return $funciono;
    }
    
}
