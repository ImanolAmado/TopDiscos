<?php

    function conectar(){

    $host='localhost';
    $nombreBBDD = 'discos';
    $usuario = 'test';
    $password = 'pass';

    try {
    $conexion = new PDO("mysql:host=$host;dbname=$nombreBBDD",$usuario,$password);
   
    return $conexion;  

    } catch (PDOException $e) {
        echo "Error en la conexión ".$e->getMessage();
    }
}


?>