<?php 
require_once 'config/db.php';
if(isset($_POST)){//SI HAY ENVIO POST
    //1-VALIDACION DE DATOS, si hay valores o no 
    $nombre=isset($_POST['nombre'])?$_POST['nombre']:false;//si hay valores o no
    $apellido=isset($_POST['apellido'])?$_POST['apellido']:false;
    $correo=isset($_POST['correo'])?$_POST['correo']:false;
    $edad=isset($_POST['edad'])?$_POST['edad']:false;
    $errores=[];

    
    //2-VALIDAR DATOS (tipo de dato)
    if (!$nombre || is_numeric($nombre) || preg_match("/[0-9]+/",$nombre)) {
        $errores['nombre']="este campo de nombre, solo acepta letras y debe estar relleno";

    }
    if (!$apellido || is_numeric($apellido) || preg_match("/[0-9]+/",$apellido)) {
        $errores['apellido']="este campo de apellido, solo acepta letras y debe estar relleno";
    }
    if (!$correo || !filter_var($correo,FILTER_VALIDATE_EMAIL)) {
        $errores['correo']="este no es un correo electronico";
    }
    if (!$edad || !is_numeric($edad)) {
        $errores['edad']="este no es un número u esta vacio";
    }
    //3-saber si hay errores o no
    if (count($errores)==0) {
        require_once '/models/persona.php';
        $persona=new Persona();
        $persona->setNombre($nombre);
        $persona->setApellido($apellido);
        $persona->setCorreo($correo);
        $persona->setEdad($edad);
        $resultadoFinal=$persona->crearPersona();
        if ($resultadoFinal) {
            $_SESSION['check']='Se ha guardado Correctamente';
        }else{
            $_SESSION['check']='Hubo un problema, intentalo de nuevo por favor';
        }
    }else{
        $_SESSION['errores']=$errores;
    }
    header('Location:index.php');
}
?>