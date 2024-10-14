<?php
include_once "Usuario.php";

session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){    
    
    if(empty ($_POST['email']) || empty ($_POST['pass'])){

        echo "¡Error! Ningún campo del login puede estra vacío";   
              
    } else {
        $emailIntroducido = $_POST['email'];
        $passIntroducido = $_POST['pass'];        
        
        // para hashear contraseñas:
        // https://onlinephp.io/password-hash    

        $resultados = Usuario::loginUsuario($emailIntroducido);

        $passwordEncontrado = $resultados['password'];
        $emailEncontrado = $resultados['email'];
        $rolEncontrado = $resultados['rol'];


        
        if (password_verify($passIntroducido,$passwordEncontrado)){                        
            // $_SESSION['email']=$_POST['email'];
            //header("Location: welcome.php");     
            //exit();            
            echo "todo ok";

        } else echo "Lo siento password no coinciden";         
    }
}