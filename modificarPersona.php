<?php
    require_once 'models/persona.php';
    if (!isset($_SESSION)) {
        session_start();    
    }
    if ($_POST) {
        if (isset($_SESSION['persona'])) {
            //verificar CAMBIOS
            $persona=new Persona();
            $nombre= isset($_POST['nombre'])?$_POST['nombre']:false;
            $apellido=isset($_POST['apellido'])?$_POST['apellido']:false;
            $correo=isset($_POST['correo'])?$_POST['correo']:false;
            $edad=isset($_POST['edad'])?$_POST['edad']:false;

            $persona->setId($_SESSION['persona']->id);
            $persona->setNombre($nombre);
            $persona->setApellido($apellido);
            $persona->setCorreo($correo);
            $persona->setEdad($edad);
            $modificado=$persona->modificarPersona();
            if ($modificado) {
                $_SESSION['resultModificado']='Se ha guardado el cambio con exito';
            }else{
                $_SESSION['resultModificado']='Hubo problemas al guardar los cambios,intentelo de nuevo por favor';
            }
            header('Location:index.php');
        }
    }
        


?>