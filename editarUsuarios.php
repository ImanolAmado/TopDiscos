<?php

session_start();

if(!isset($_SESSION['email'])){
   header("Location:index.php");
   exit();
}

if($_SERVER["REQUEST_METHOD"]=="POST"){    
    
    $id_usuario = $_POST['id'];
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];     
    
    $_SESSION['editarUser']="editar";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link href="../CSS/style.css" rel="stylesheet" type="text/css" /> -->

    <title>Editar usuario</title>
</head>
<body>

 <!-- Insertamos menú -->
 <?php include_once "vistaMenu.php";?>
    
    <h3>Editar nuevo usuario</h3><br> 
    <form class="registroNuevo" method="post" action="procesarUsuarioEditado.php">           
    <label for="nombre">Nombre: </label><br>
          <input type="text" id="nombre" name="nombre" placeholder="nombre usuario" required><br>
          <label for="email">Email: </label><br>
          <input type="text" id="email" name="email" placeholder="email" required><br>
          <label for="passw">password </label><br>
          <input type="text" id="pass" name="pass" placeholder="password" required><br><br>
          <label for="rol">Rol del usuario</label>
              <select id="rol" name="rol">
                <option value="Usuario">Usuario</option>
                <option value="Admin">Admin</option>                
              </select>
          <br><br>  
        <input type="submit" value ="Enviar">
    </form>    



   
    <?php include_once "vistaFooter.php";?>