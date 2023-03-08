<?php 
class DB{
    public static function connect(){
        $mysqli= new mysqli("localhost","root","Lozano001@","personasdb");
        return $mysqli;
    }
}
session_start();
?>