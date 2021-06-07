<?php
require_once("resenasDB.php");
class Usuario{
    private static $nombre;
    private static $rango;

    public static function login($nombre,$contrasena) {
        $datos = false;
        try {
              $sql = "select nombre,clave,rango from usuarios where nombre = :nom";
              $preparada = ResenasDB::getConexion()->prepare($sql);	
              $preparada->execute(array(':nom'=>$nombre));
              if ($preparada->rowCount() == 1) {
                  $dato = $preparada->fetchAll(PDO::FETCH_ASSOC)[0];
                  if ($dato['nombre']==$nombre && password_verify($contrasena,$dato['clave'])) {
                    self::$nombre=$dato['nombre'];
                    self::$rango=$dato['rango'];
                      return true;
                  }
              }
          } catch (PDOException $e) {
               throw new Exception('Error con la base de datos: ' . $e->getMessage());
          }
          return $datos;
      }

    public static function registrarse($nombre,$contrasena){
        $datos = false;
        try {
            $sql = "select nombre from usuarios where nombre = :nom"; 
            $preparada = ResenasDB::getConexion()->prepare($sql);	
            $preparada->execute( array(':nom'=>$nombre));
            if ($preparada->rowCount() == 1) {
                $dato = $preparada->fetchAll(PDO::FETCH_ASSOC)[0];
                if ($dato['nombre']==$nombre) {
                    return false;
                }
            }else{
                $sqlregis="insert into usuarios(nombre,clave,rango) values (:nombre,:clave,0)";
                $contrasenahash = password_hash($contrasena, PASSWORD_DEFAULT);
                $prepa=ResenasDB::getConexion()->prepare($sqlregis);
                $prepa->execute(array(':nombre'=>$nombre,':clave'=>$contrasenahash));
                if($prepa->rowCount()>0){
                    self::$nombre=$nombre;
                    self::$rango=0;
                    return true;
                }
            }
        } catch (PDOException $e) {
             throw new Exception('Error con la base de datos: ' . $e->getMessage());
        }
        return $datos;
    }
    public function getRang($nombre){
        $datos=0;
        try {
            $sql = "select nombre,rango from usuarios where nombre = :nom"; 
            $preparada = ResenasDB::getConexion()->prepare($sql);	
            $preparada->execute( array(':nom'=>$nombre));
            if ($preparada->rowCount() == 1) {
                $dato = $preparada->fetchAll(PDO::FETCH_ASSOC)[0];
                if ($dato['nombre']==$nombre) {
                    $datos=$dato["rango"];
                }
            }
        } catch (PDOException $e) {
            throw new Exception('Error con la base de datos: ' . $e->getMessage());
        }
        return $datos;
    }
}   
?>