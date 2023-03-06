<?php
if ($_GET) {
    $id=$_GET['id'];
    require_once 'models/persona.php';
    $persona=new Persona();
    $persona->setId($id);
    $verificar=$persona->UserXId();
    if ($verificar) {
        $object=$verificar->fetch_object();
        $_SESSION['persona']=$object;
    }else{
        $_SESSION['errorPersona']='No se encuentra esta persona;';
    }
    header('Location:index.php');
}

?>