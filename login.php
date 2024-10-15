<?php
include_once "Usuario.php";

session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){    
    
    if(empty ($_POST['email']) || empty ($_POST['pass'])){

        echo "¡Error! Ningún campo del login puede estra vacío";   
              
    } else {

        if(emailValido($_POST['email'])){
            $emailIntroducido =  $_POST['email'];
        } else echo "Formato de email incorrecto";

        $passIntroducido = $_POST['pass'];      
        
        // para hashear contraseñas:
        // https://onlinephp.io/password-hash    

        $resultados = Usuario::loginUsuario($emailIntroducido);

        $passwordEncontrado = $resultados['password'];
        $emailEncontrado = $resultados['email'];
        $rolEncontrado = $resultados['rol'];
        $usuarioEncontrado = $resultados['nombre'];
        $idEncontrado = $resultados['id_usuario'];

        
        if (password_verify($passIntroducido,$passwordEncontrado)){                        
            $_SESSION['email']=$emailEncontrado;
            $_SESSION['usuario']=$usuarioEncontrado;
            $_SESSION['id_usuario']=$idEncontrado;
            $_SESSION['rol']=$rolEncontrado;

            header("Location: welcome.php");    
            exit();     
           
        } else echo "Lo siento password no coinciden";         
    }

}
    /////////////////// FUNCIONES ///////////////////

    function emailValido($email){
        $email=htmlspecialchars($email);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        } else {                
            return false;
        }    
    }

   
