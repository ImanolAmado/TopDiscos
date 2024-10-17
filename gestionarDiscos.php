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

    <h3>Introducir nuevo disco</h3>
    <form class="registroNuevo" method="post" action="procesarDisco.php"> 
        
        <label>Introducir datos</label><br><br>

          <label for="titulo">Título: </label><br>
          <input type="text" id="titulo" name="titulo" placeholder="título del disco"><br>
          <label for="interprete">Interprete: </label><br>
          <input type="text" id="interprete" name="interprete" placeholder="interprete o grupo"><br>
          <label for="fecha">Fecha publicación: </label><br>
          <input type="date" id="fecha" name="fecha" placeholder="fecha"><br>
          <label for="ismn">ISMN (formato xxx-x-xxxx-xxxx-x) </label><br>
          <input type="text" id="ismn" name="ismn" placeholder="número ismn"><br>
          <label for="critica">Crítica: </label><br>
          <textarea id="critica" name="critica" rows="5" cols="40"></textarea><br><br>          

        <input type="submit" value ="Enviar">
    </form><br><br>   
    
    <?php include_once "vistaFooter.php";?>

