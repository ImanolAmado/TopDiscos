<?php
include_once "Usuario.php";

session_start();
include_once "Usuario.php";

if(!isset($_SESSION['email'])){
    header("Location:index.php");
    exit();
} else {

 Usuario::eliminarUsuario($_SESSION['registroABorrar']);
 $_SESSION['registroABorrar']=0;
 header("Location:todosLosUsuarios.php");
 exit();
}


