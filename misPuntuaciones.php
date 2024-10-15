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
$listaDiscos=Usuario::discosUsuario(1);
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
    
    <?php var_dump($listaDiscos);?>

 
    <?php include_once "vistaFooter.php";?>






