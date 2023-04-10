<?php 
class DB{
    public static function connect(){
        $mysqli= new mysqli("localhost","ubuntu","Danielito123@","personasdb");
        if (!$mysqli) {
            die("Conexion fallida: ". mysqli_connect_error());
        }
       
        return $mysqli;
    }
    
    
}
var_dump(DB::connect());
session_start();
?>