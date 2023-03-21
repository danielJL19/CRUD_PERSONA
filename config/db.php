<?php 
class DB{
    public static function connect(){
        $mysqli= new mysqli("databaseexample.cffwnfqiuyny.us-east-1.rds.amazonaws.com","admin","papelucho123","personasdb");
        if (!$mysqli) {
            die("Conexion fallida: ". mysqli_connect_error());
        }
       
        return $mysqli;
    }
    
    
}
var_dump(DB::connect());
session_start();
?>