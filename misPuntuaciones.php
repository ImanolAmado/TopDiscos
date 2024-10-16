<?php
include_once "ConectorBBDD.php";
include_once "Usuario.php";

session_start();

if(!isset($_SESSION['email'])){
   header("Location:index.php");
   exit();
}

// Conectamos a la BBDD y nos traémos toda la info
// de los discos que el usuario a votado
$conexion = conectar();
$listaDiscos=Usuario::discosUsuario($_SESSION['id_usuario']);
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
      <th scope="col">Mi Puntuación</th>  
      <th scope="col">Cambiar Puntuación</th>   
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
      <td>        
        <select id="puntos" name="puntos">
          <option value="1"'; if($disco->getPuntuacion()==1){echo'selected';} echo'>1</option>
          <option value="2"'; if($disco->getPuntuacion()==2){echo'selected';} echo'>2</option>
          <option value="3"'; if($disco->getPuntuacion()==3){echo'selected';} echo'>3</option>
          <option value="4"'; if($disco->getPuntuacion()==4){echo'selected';} echo'>4</option>
          <option value="5"'; if($disco->getPuntuacion()==5){echo'selected';} echo'>5</option>
        </select>  
        <form id="formu" method="post" action="updatePuntuaciones.php">
          <input id="id_usuario" name="id_usuario" type="hidden" value="'.$_SESSION['id_usuario'].'">
          <input id="id_puntuacion" name="id_puntuacion" type="hidden" value="'.$disco->getPuntuacion().'">
          <input id="id_disco" name="id_disco" type="hidden" value="'.$disco->getId_disco().'">
          <input type="submit" value ="Enviar">          
        </form>
      </td>
    </tr>
    <tr>';    
    }
   ?>    
  </tbody>
</table> 

    <?php include_once "vistaFooter.php";?>

    

 
 






