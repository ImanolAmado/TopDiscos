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
    

  <!-- Incluímos el menú -->
    <?php include_once "vistaMenu.php";?>
    
    <h3>Perfil de <?php echo $_SESSION['usuario']?></h3>
    <h6><b>Nombre: </b><?php echo $_SESSION['usuario']?></h6>
    <h6><b>Email: </b><?php echo $_SESSION['email']?></h6>
    <h6><b>Role: </b><?php echo $_SESSION['rol']?></h6>

    <?php include_once "vistaFooter.php";?>