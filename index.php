<?php require_once 'config/parameters.php';?>

<?php require_once 'helpers.php';?>
<?php require_once 'models/persona.php';?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Personas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        
        <div class="container-md">
            <div class="bg-light">
                <div class="d-flex flex-column px-3">
                    <?php if(isset($_SESSION['errores'])){

                            foreach ($_SESSION['errores'] as $errores) {
                                echo '<div class="aviso-red fs-3">'.$errores.'</div>';
                            }
                            
                            
                        }
                    Helper::removeSession('errores');
                        if (isset($_SESSION['check'])) {
                            echo '<div class="text-center h2 bg-green">'.$_SESSION['check'].'</div>';
                        }
                            Helper::removeSession('check');
                    ?>
                    <?php if(isset($_SESSION['persona'])){
                        echo '<h2 class="text-center py-2">Modificar persona</h2>';
                        $url='modificarPersona.php';
                    }else{
                        echo '<h2 class="text-center py-2">Registro persona</h2>';
                        $url='registro.php';
                    }
                    
                    if (isset($_SESSION['resultModificado'])) {
                        echo '<div class="bg-green h2">'.$_SESSION['resultModificado'].'</div>';
                        Helper::removeSession('persona');
                    }
                    Helper::removeSession('resultModificado');
                    ?>
                    
                    <form action="<?=$url;?>" method="post">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Daniel" value="<?php echo (isset($_SESSION['persona']))?$_SESSION['persona']->nombre:'';?>">
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Jiménez" value="<?php echo (isset($_SESSION['persona']))?$_SESSION['persona']->apellido:'';?>">
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" name="correo" id="correo" class="form-control" placeholder="correo@example.cl" value="<?php echo (isset($_SESSION['persona']))?$_SESSION['persona']->correo:'';?>">
                        </div>
                        <div class="mb-3">
                            <label for="edad" class="form-label">Edad</label>
                            <input type="number" name="edad" id="edad" class="form-control" value="<?php echo (isset($_SESSION['persona']))?$_SESSION['persona']->edad:'';?>">
                        </div>
                        <?php 
                            if (!isset($_SESSION['persona'])) {
                                echo '<input type="submit" value="Crear Persona" class="btn btn-success mb-3">';    
                            }else{
                                echo '<div class="btn-group" role="group" aria-label="Basic example">';
                                echo '<button type="submit" class="btn btn-success">Guardar Cambios</button>'; 
                                echo '<a href="salir.php" class="btn btn-primary cambioBTN">Salir</a>';
                                echo '</div>';
                                echo $_SESSION['persona']->id;
                            }
                        ?>
                        

                    </form>
                    <input type="text" name="search" id="seach" placeholder="Busca por Correo" class="form-control search" >
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Edad</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $resultado=Helper::allUser();?>
                            <?php while($resultadoAll=$resultado->fetch_assoc()):?>
                                <tr>
                                    <th scope="row"><?=$resultadoAll['id'];?></th>
                                    <td><?=$resultadoAll['nombre'];?></td>
                                    <td><?=$resultadoAll['apellido'];?></td>
                                    <td><?=$resultadoAll['correo'];?></td>
                                    <td><?=$resultadoAll['edad'];?></td>
                                    <td><?=$resultadoAll['fechaOrigen'];?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="eliminar.php?id=<?=$resultadoAll['id'];?>" class="btn btn-danger">Eliminar</a>
                                            <a href="modificar.php?id=<?=$resultadoAll['id'];?>" class="btn btn-primary">Modificar</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile;?>   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>