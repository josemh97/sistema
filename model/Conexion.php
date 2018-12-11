<?php 

class BaseDeDatos {
    const servidor = "localhost";
    const usuario = "root";
    const password = "IGA181296";
    const basededatos = "verificacionapoyos";

    public static function Conectar(){
        try{
            $conexion = new PDO(
                "mysql:host=".self::servidor.
                "; dbname=".self::basededatos.
                "; charset=utf8",
                self::usuario,
                self::password
            );
            $conexion -> setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
            return $conexion;
        } catch(Exception $e){
            return "Fallo ".$e->getMessage();
        }
    }
}

?>