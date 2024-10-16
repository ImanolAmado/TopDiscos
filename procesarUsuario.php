<?php
session_start();
include_once "Usuario.php";

$pass = password_hash('jedimaster', PASSWORD_DEFAULT, ['cost' => 10]);

$usuario = new Usuario(0, "Juan Bergara", 
$pass,
"juanbergara@lettera.net", "usuario");

Usuario::insertarUsuario($usuario);