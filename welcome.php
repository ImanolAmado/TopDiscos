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
    <div class="row">
    <div class="col-lg-6"><h1>Mi web de discos</h1></div>
    </div>
    <div class="row">
        <div class="col-lg-6">
        <nav class="navbar navbar-expand-lg navbar-light " >
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#opciones">
              <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- enlaces -->
            <div class="collapse navbar-collapse" id="opciones">   
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="#Discos">Todos los dicos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#puntuacion">Mis puntuaciones</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#Perfil">Mi perfil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#Salir">Salir</a>
                </li>           
              </ul>
            </div>
          </nav>
        </div>
    </div>

    <h1>Perfil de <?php echo $_SESSION['usuario']?></h1>
    <h6><b>Nombre: </b><?php echo $_SESSION['usuario']?></h6>
    <h6><b>Email: </b><?php echo $_SESSION['email']?></h6>
    <h6><b>Role: </b><?php echo $_SESSION['rol']?></h6>

    <footer>
        <h6>2024 Usurbil lanbide eskola</h6>
    </footer>

 <!--    <h1>¡Bienvenid@!<?php echo " ".$_SESSION['usuario']?></h1><br>
    <form class="exit" method="post" action="index.php">
        <input type="submit" value="Cerrar sesión">
    </form>    
 -->


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>