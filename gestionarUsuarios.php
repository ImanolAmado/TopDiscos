<?php

session_start();

if(!isset($_SESSION['email'])){
   header("Location:index.php");
   exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../CSS/style.css" rel="stylesheet" type="text/css" />

    <title>Document</title>
</head>
<body>

    <!-- Insertamos menú -->
    <?php include_once "vistaMenu.php";?>

    <h3>Añadir nuevo usuario</h3>
    <form class="registroNuevo" method="post" action="procesarUsuario.php"> 
        
        <label>Introducir datos</label><br><br>

          <label for="nombre">Nombre: </label><br>
          <input type="text" id="nombre" name="nombre" placeholder="Nombre"><br>
          <label for="password">Contraseña: </label><br>
          <input type="text" id="password" name="password" placeholder="Introduzca la contraseña"><br>
          <label for="email">Email: </label><br>
          <input type="email" id="email" name="email" placeholder="Email"><br>
          <label for="rol">Rol:</label><br>
          <input type="text" id="rol" name="rol" placeholder="Rol"><br>         

        <input type="submit" value ="Enviar">
    </form>    

    <?php include_once "vistaFooter.php";?>
