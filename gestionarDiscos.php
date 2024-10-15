<?php
include_once "ConectorBBDD.php";
include_once "Disco.php";

/*
session_start();

if(!isset($_SESSION['email'])){
   header("Location:welcome.php");
   exit();
}
*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir registro</title>
</head>
<body>
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
    </form>    
</body>
</html>


