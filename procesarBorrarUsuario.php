<?php
include_once "Usuario.php";
session_start();

// Si no se está logueado, no se puede acceder a la página
if(!isset($_SESSION['email'])){
    header("Location:index.php");
    exit();
}


// Recibimos los datos que necesitamos para eliminar usuario
if($_SERVER["REQUEST_METHOD"]=="POST"){    
    
    $id_usuario = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];    

    $_SESSION['registroABorrar'] = $_POST['id'];
}
?>

<!-- Empieza el HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Borrar usuario</title>
</head>
<body>
    
  <!-- Incluímos el menú -->
    <?php include_once "vistaMenu.php";?>


<body>
    <br>
    <h4>¿Eliminar el siguiente registro?</h4><br><br>
    <h5>Nombre: <?php echo $nombre ?></h5>
    <h5>Email: <?php echo $email ?></h5>
    <h5>Rol: <?php echo $rol ?></h5><br>

    <button><a href="todosLosUsuarios.php" style="text-decoration: none; color:black">Cancelar</a></button>  
    <button><a href="borrarUsuario.php" style="text-decoration: none; color:black;">Aceptar</a></button><br><br> 
    
    

    <?php include_once "vistaFooter.php";?>







