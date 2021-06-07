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
}
