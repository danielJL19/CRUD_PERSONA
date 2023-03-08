<?php 
class DB{
    public static function connect(){
        $mysqli= new mysqli("localhost","root","Lozano001@","personasdb");
        if (!$mysqli) {
            die("Conexion fallida: ". mysqli_connect_error());
        }
        echo $mysqli;
        return $mysqli;
    }
    
    
}
var_dump(DB::connect());
session_start();
?>