<?php 
class DB{
    public static function connect(){
        $mysqli= new mysqli("localhost","root","","personasDB");
        return $mysqli;
    }
}
session_start();
?>