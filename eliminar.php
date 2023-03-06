<?php 
    if ($_GET) {
        require_once 'models/persona.php';
        $id=intval($_GET['id']);
        $persona=new Persona();
        $persona->setId($id);
        $resultFinal=$persona->delete();
        if($resultFinal){
            $_SESSION['delete']='Se ha eliminado correctamente';
        }else{
            $_SESSION['delete']='No se ha eliminado, intentelo de nuevo por favor';
        }
        header("Location:index.php");
    }
?>