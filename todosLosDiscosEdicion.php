<?php
include_once "ConectorBBDD.php";
include_once "Disco.php";

session_start();

if(!isset($_SESSION['email'])){
   header("Location:welcome.php");
   exit();
}

// Usamos la misma función que usamos en el listado general de discos

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
    <?php include_once "vistaMenu.php";?><br>
    
    <a class="btn btn-primary" href="gestionarDiscos.php" role="button">Añadir disco</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Titulo</th>
      <th scope="col">Interprete</th>
      <th scope="col">Fecha</th>
      <th scope="col">Ismn</th>
      <th scope="col" style="width:3%">Acciones</th>
      <th scope="col"  style="width:3%"></th>
    </tr>
  </thead>
  <tbody>
   <?php
  // Se van creando las celdas en cada iteracción
    foreach($listaDiscos as $disco){ ?>

    <tr>
      <td scope="row"> <?php echo $disco->getTitulo(); ?></td>
      <td> <?php echo $disco->getInterprete(); ?></td>
      <td> <?php echo $disco->getFecha_publicacion(); ?></td>
      <td> <?php echo $disco->getIsmn(); ?></td>
      <td>
        <form id="f1" method="post" action="procesarBorrarDisco.php">
          <input type="hidden" id="titulo" name="titulo" value="<?php echo $disco->getTitulo(); ?>">
          <input type="hidden" id="interprete" name="interprete" value="<?php echo $disco->getInterprete(); ?>">
          <input type="hidden" id="fecha" name="fecha" value="<?php echo $disco->getFecha_publicacion();  ?>">
          <input type="hidden" id="ismn" name="ismn" value="<?php echo $disco->getIsmn(); ?>">
          <input type="hidden" id="id_disco" name="id_disco" value="<?php echo $disco->getId_disco(); ?>">
          <button type="submit" ><img src="img/bin.png" width="20px" height="20px" alt="Foto eliminar"></button> 
        </form>
      </td>
      <td>
        <form id="f2" method="post" action="editarDisco.php">
          <input type="hidden" id="id" name="id" value="<?php  ?>">
          <input type="hidden" id="rol" name="rol" value="<?php  ?>">
          <input type="hidden" id="nombre" name="nombre" value="<?php  ?>">
          <input type="hidden" id="email" name="email" value="<?php ?>">
          <input type="hidden" id="password" name="password" value="<?php  ?>">
          <button type="submit" ><img src="img/editar.png" width="20px" height="20px" alt="Foto editar"></button> 
        </form>
        </td>       
    </tr>
    <tr>    
   <?php }
   ?>    
  </tbody>
</table> 

    <?php include_once "vistaFooter.php";?>