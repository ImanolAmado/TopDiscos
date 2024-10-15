<?php
include_once "ConectorBBDD.php";
include_once "Disco.php";

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
$listaDiscos=Disco::todosLosDiscos();

var_dump($listaDiscos);




?>