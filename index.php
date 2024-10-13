<?php
session_start();
if(isset($_SESSION['email'])){
   header("Location:welcome.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h1>Bienvenidos a nuestra web</h1><br><br>

    <form class="login" method="post" action="login.php">
        <label for="email">Introduce correo electrónico</label><br><br>
        <input type="email" id="email" name="email"><br><br><br>
        <label for="pass">Introduce contraseña</label><br><br>
        <input type="password" id="pass" name="pass"><br><br>

        <input type="submit" value="login">
    </form>
        
</body>
</html>