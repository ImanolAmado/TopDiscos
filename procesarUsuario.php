<?php
session_start();
include_once "Usuario.php";

// Si nadie está logueado, redirige al index
if(!isset($_SESSION['email'])){
    header("Location:index.php");
    exit();
 }

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['nombre']) || empty($_POST['pass']) || empty($_POST['email']) || empty($_POST['rol'])) {
       
        echo "¡Error! Ningún campo puede estar vacío";   
        exit();
    }else{

        $noCorrecto=0;
        //se introduce en variales despues de haber sido validadas
         $idUsuarioIntroducido = 0;
         $nombreIntroducido = validarNombre($_POST['nombre']);
         $passIntroducido = validarPassword($_POST['pass']);
         if(validarEmail($_POST['email'])){
            $emailIntroducido = $_POST['email'];
         }else{
            $noCorrecto = 1;
         }
         $rolIntroducido = validarRol($_POST['rol']);


         if($noCorrecto == 1){
            header('Location:gestionarUsuarios.php');
         }

         //si el email no está en la BBDD la información del usuario ingresará en la BBDD
         if(Usuario::compararEmails($emailIntroducido)){
            echo '¡Error! El email ya existe.';
            exit();
        }else{
            ///Se crea un nuevo usuario
        $usuario = new Usuario(
            $idUsuarioIntroducido,  
            $nombreIntroducido,
            $passIntroducido,
            $emailIntroducido,
            $rolIntroducido
        );
            //Se ingresa dentro de la BBDD
        Usuario::insertarUsuario($usuario);
        header('Location:todosLosUsuarios.php');
        exit();
    }
    }
}


//////FUNCIONES////////
function validarNombre($nombre){
    $nombreNuevo = strip_tags($nombre);//elimina cualquier caracter html o php
    return htmlspecialchars($nombreNuevo);//ignora los caracteres especiales
}

function ValidarPassword($password){    
    $passwordNuevo = strip_tags($password);//elimina cualquier caracter html o php
    $passwordNuevo = htmlspecialchars($passwordNuevo);//ignora los caracteres especiales
    return $passwordNuevo = password_hash($_POST['pass'], PASSWORD_DEFAULT, ['cost' => 10]);
}

function validarEmail($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){//método pra validar el email
        return true;
    }else{
        echo false;
    }
}

function validarRol($rol){
    $roles = ['Usuario', 'Admin'];
    if(!in_array($rol, $roles)){ //Verifica si rol está dentro del array $roles
        echo '¡Error! El rol no corresponde.';
        exit();
    }else{
        return $rol;
    }
}