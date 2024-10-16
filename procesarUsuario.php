<?php
session_start();
include_once "Usuario.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['nombre']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['rol'])) {
       
        echo "¡Error! Ningún campo del login puede estra vacío";   

    }else{


    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 10]);
    }
}


//////FUNCIONES////////
function validartexto($texto){
    $textoNuevo = strip_tags($texto);
    return htmlspecialchars($textoNuevo);
}

/*mirar si existe o no email para comparar*/
function validarEmail($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        return $email;
    }else{
        '¡Error! El email no es correcto';
    }
}

/* function validarRol($rol){
    if($rol ===)
} */



/* Usuario::insertarUsuario($usuario); */