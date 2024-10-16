<?php
include_once "Disco.php";
session_start();


if($_SERVER["REQUEST_METHOD"]=="POST"){     
    
    $id_usuario = $_SESSION['id_usuario'];
    $id_disco = $_POST['id_disco'];
    $puntuacion = $_POST['puntos'];

    // Tenemos que mirar si existe registro de ese id_usuario con ese id_disco
    // en la tabla disco_puntuacion.

     // Si existe, es un update. Si no existe, es un insert.
    if(Disco::consultaRegistro($id_usuario, $id_disco)){        
        Disco::updatePuntuacion($id_usuario, $id_disco, $puntuacion);
    } else Disco::insertPuntuacion ($id_usuario, $id_disco, $puntuacion);
       
   
    header("Location:misPuntuaciones.php");
    exit();
}