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
    </form>    

    <footer>
        <h6>2024 Usurbil lanbide eskola</h6>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


