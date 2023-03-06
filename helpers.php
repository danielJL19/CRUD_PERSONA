<?php 
require_once 'models/persona.php';
if (!isset($_SESSION)) {
    session_start();
}

    class Helper{
        public static function removeSession($session){
            if(isset($_SESSION[$session])){//si existe esta session
                $_SESSION[$session]=null; 
                unset($_SESSION[$session]);
            }
        }
        public static function allUser(){
            $persona = new Persona();
            $filas=$persona->allUser();
            return $filas;
        }
    }

?>