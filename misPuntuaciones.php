<?php
include_once "ConectorBBDD.php";
include_once "Usuario.php";

/*
session_start();

if(!isset($_SESSION['email'])){
   header("Location:welcome.php");
   exit();
}
*/

// mirar si hay cookie, si no existe cookie
// llamar a la BBDD y establecer cookie,
// si existe, no llamar a la BBDD

$conexion = conectar();
$listaDiscos=Usuario::discosUsuario(1);

var_dump($listaDiscos);

//include_once // incluir mostrar HTML para discos

