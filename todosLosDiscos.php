<?php
include_once "ConectorBBDD.php";
include_once "Disco.php";

session_start();

if(!isset($_SESSION['email'])){
   header("Location:welcome.php");
   exit();
}

// Llamada a la BBDD para obtener la lista de todos
// los discos con sus respectivas medias de puntuación
$conexion = conectar();
$listaDiscos=Disco::todosLosDiscos();
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
    
  <!-- Incluímos el menú -->
    <?php include_once "vistaMenu.php";?>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Titulo</th>
      <th scope="col">Interprete</th>
      <th scope="col">Fecha</th>
      <th scope="col">Puntuación</th>
      <th scope="col">Crítica</th>
    </tr>
  </thead>
  <tbody>
   <?php
  // Se van creando las celdas en cada iteracción
    foreach($listaDiscos as $disco){
    echo '<tr>
      <td scope="row">'.$disco->getTitulo().'</td>
      <td>'.$disco->getInterprete().'</td>
      <td>'.$disco->getFecha_publicacion().'</td>
      <td>'.$disco->getPuntuacion().'</td>
      <td>'.$disco->getCritica().'</td>      
    </tr>
    <tr>';    
    }
   ?>    
  </tbody>
</table> 

    <?php include_once "vistaFooter.php";?>

