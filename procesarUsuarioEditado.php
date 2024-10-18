<?php

session_start();

if(!isset($_SESSION['email'])){
    header("Location:index.php");
    exit();
 }
include_once 'Usuario.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['nombre']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['rol'])) {
       
        echo "¡Error! Ningún campo puede estar vacío";   
        exit();
    }else{

    $id_usuario = $_POST['id'];
    $nombre = $_POST['nombre'];
    $password = validarPassword($_POST['password']);
    $emailNuevo = $_POST['email'];
    $emailAntiguo = $_POST['emailAntiguo'];
    $rol = $_POST['rol'];    


    if($emailNuevo == $emailAntiguo){
        Usuario::actualizarUsuario($id_usuario, $nombre, $password, $emailNuevo, $rol);          
        header('Location:todosLosUsuarios.php');  

    }else{
        if(Usuario::existeEmail($emailNuevo)){

            echo '¡Error! El email ya existe.';
        }else{
            echo $emailNuevo;
            Usuario::actualizarUsuario($id_usuario, $nombre, $password, $emailNuevo, $rol);          
            header('Location:todosLosUsuarios.php');  
        }
    }


}
}    
function validarPassword($password){
    $passwordNuevo = strip_tags($password);//elimina cualquier caracter html o php
    $passwordNuevo = htmlspecialchars($passwordNuevo);//ignora los caracteres especiales
    return $passwordNuevo = password_hash($_POST['pass'], PASSWORD_DEFAULT, ['cost' => 10]);
}






?>