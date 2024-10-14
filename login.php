<?php
include_once "ConectorBBDD.php";

session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){    
    
    if(empty ($_POST['email']) || empty ($_POST['pass'])){

        echo "¡Error! Ningún campo del login puede estra vacío";   
              
    } else {
        $emailIntroducido = $_POST['email'];
        $passIntroducido = $_POST['pass'];        
        
        // para hashear contraseñas:
        // https://onlinephp.io/password-hash    


        // llamar a la BBDD y coger el email y contraseña

        $conexion = conectar();

        // Consulta SQL login
        $sql = "select password, email, rol from discos where email = :email and password = :password";

        $stmt=$conexion->prepare($sql);

        // vincular parámetros     
        $stmt->bindParam(':email',  $emailIntroducido);

        $stmt->execute();
        
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            echo $row['id']."--".$row['nombre']."--".$row['precio']."<br>";
        }





        
         
        
        if ($emailGuardado == $emailIntroducido && password_verify($passIntroducido,$passGuardado)){                        
            $_SESSION['email']=$_POST['email'];
            //header("Location: welcome.php");     
            //exit();            
            echo "todo ok";

        } else echo "Lo siento, email o password no coinciden";         
    }
}