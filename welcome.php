<?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>¡Bienvenido!<?php echo " ".$_SESSION['email']?></h1><br>
    <form class="exit" method="post" action="logout.php">
        <input type="submit" value="Cerrar sesión">
    </form>    
</body>
</html>