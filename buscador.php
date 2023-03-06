<?php
include_once 'models/persona.php';
$persona=new Persona();
$persona->setCorreo($_POST['buscar']);
$objEncontrado=$persona->buscador();

while($obj=$objEncontrado->fetch_assoc()){
?>
    <p class="text-center"> <?php echo $obj['correo'];?></p>
<?php }?>