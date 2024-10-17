<?php
include_once "ConectorBBDD.php";
include_once "Usuario.php";

session_start();

if(!isset($_SESSION['email'])){
   header("Location:welcome.php");
   exit();
}

// Llamada a la BBDD para obtener la lista de todos
// los usuarios
$conexion = conectar();
$listaUsuarios=Usuario::todosLosUsuarios();
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

 <a class="btn btn-primary" href="gestionarUsuarios.php" role="button">Añadir usuario</a>

  <!-- Tabla bootstrap -->

<table class="table">
  <thead>
    <tr>
    <tr>
      <th scope="col" style="width:5%">Id</th>
      <th scope="col" style="width:10%">Rol</th>
      <th scope="col" style="width:20%">Nombre</th>
      <th scope="col" style="width:15%">Email</th>
      <th scope="col" style="width:30%">Password</th>
      <th scope="col" style="width:10%">Acciones</th>
      <th scope="col" style="width:10%"></th>
    </tr>
    </tr>
  </thead>
  <tbody>     
    <?php       
    // Se van creando las celdas en cada iteracción
    foreach($listaUsuarios as $usuario){ ?>
    <tr>
      <td scope="row"><?php echo $usuario->getId_usuario(); ?></td>
      <td><?php echo $usuario->getRol(); ?></td>
      <td><?php echo $usuario->getNombre(); ?></td>
      <td><?php echo $usuario->getEmail(); ?></td>
      <td><?php echo $usuario->getPassword(); ?></td>
      <td>
        <form id="f1" method="post" action="procesarBorrarUsuario.php">
          <input type="hidden" id="id" name="id" value="<?php echo $usuario->getId_usuario(); ?>">
          <input type="hidden" id="rol" name="rol" value="<?php echo $usuario->getRol(); ?>">
          <input type="hidden" id="nombre" name="nombre" value="<?php echo $usuario->getNombre(); ?>">
          <input type="hidden" id="email" name="email" value="<?php echo $usuario->getEmail(); ?>">
          <input type="hidden" id="password" name="password" value="<?php echo $usuario->getPassword() ?>">
          <input type="submit" value ="Eliminar">
        </form>
    </td>
      <td>
        <form id="f2" method="post" action="editarUsuario">
          <input type="hidden" id="id" name="id" value="<?php echo $usuario->getId_usuario(); ?>">
          <input type="hidden" id="rol" name="rol" value="<?php echo $usuario->getRol(); ?>">
          <input type="hidden" id="nombre" name="nombre" value="<?php echo $usuario->getNombre(); ?>">
          <input type="hidden" id="email" name="email" value="<?php echo $usuario->getEmail(); ?>">
          <input type="hidden" id="password" name="password" value="<?php echo $usuario->getPassword() ?>">
          <input type="submit" value ="Editar">
        </form>
      </td>      
    </tr>
    <tr>
    <?php }   
    ?>
  </tbody>
</table>

    <?php include_once "vistaFooter.php";?>