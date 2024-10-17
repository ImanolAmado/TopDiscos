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
    <title>Mis puntuaciones</title>
</head>
<body>
    
  <!-- Incluímos el menú -->
    <?php include_once "vistaMenu.php";?><br>
    
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
    foreach($listaDiscos as $disco){ ?>
    <tr>
      <td scope="row"><?php echo $disco->getTitulo() ?></td>
      <td> <?php echo $disco->getInterprete() ?></td>
      <td> <?php echo $disco->getFecha_publicacion() ?></td>
      <td> 
        <!-- Si la puntuación es 0, imprimimos mensaje "Sin puntuar" -->
        <?php if ($disco->getPuntuacion()==0){
          echo 'Sin puntuar';          
        } else echo $disco->getPuntuacion() ?>
      </td> 
      <td>        
      <form id="formu" method="post" action="updatePuntuaciones.php">  
        <select id="puntos" name="puntos">
          <option value="1"<?php if($disco->getPuntuacion()==1){echo'selected';} ?>>1</option>
          <option value="2"<?php if($disco->getPuntuacion()==2){echo'selected';} ?>>2</option>
          <option value="3"<?php if($disco->getPuntuacion()==3){echo'selected';} ?>>3</option>
          <option value="4"<?php if($disco->getPuntuacion()==4){echo'selected';} ?>>4</option>
          <option value="5"<?php if($disco->getPuntuacion()==5){echo'selected';} ?>>5</option>
        </select>           
          <input id="id_disco" name="id_disco" type="hidden" value="<?php echo $disco->getId_disco()?>">        
          <input type="submit" value ="Enviar">          
        </form>
      </td>
    </tr>
    <tr>   
  <?php }
   ?>    
  </tbody>
</table><br><br>

<?php include_once "vistaFooter.php";?>