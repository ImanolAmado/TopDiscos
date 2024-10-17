<?php
session_start();
include_once "Disco.php";

// Si nadie está logueado, redirige al index
if(!isset($_SESSION['email'])){
    header("Location:index.php");
    exit();
 }

if($_SERVER["REQUEST_METHOD"]=="POST"){    
    
    if(empty ($_POST['titulo']) || empty ($_POST['interprete']) || empty ($_POST['fecha']) || empty ($_POST['ismn']) || empty ($_POST['critica'])){

        echo "¡Error! Ningún campo puede estra vacío";   
              
    } else {       
        $noCorrecto=0;

        $idDiscoIntroducido = 0;
        $tituloIntroducido = validarTexto($_POST['titulo']);
        $interpreteIntroducido = validarTexto($_POST['interprete']);
        $fechaIntroducida = validarFecha($_POST['fecha']);
        if(validarIsmn($_POST['ismn'])){
            $ismnIntroducido = $_POST['ismn'];
        } else $noCorrecto=1;
        $criticaIntroducida = longitudCritica($_POST['critica']);
        $puntuacionIntroducida = 0;

        if($noCorrecto==1){
            header('Location:gestionarDiscos.php');
        }


        if(Disco::comprobarIsmn($ismnIntroducido)){
            echo '¡Error! El ismn ya existe.';
        }else{
            
        
        $disco = new Disco(
            $idDiscoIntroducido,  
            $tituloIntroducido,
            $interpreteIntroducido,
            $criticaIntroducida,
            $fechaIntroducida,
            $puntuacionIntroducida,
            $ismnIntroducido
        );

        Disco::insertarDisco($disco);
        header("Location:todosLosDiscosEdicion.php");
        exit();

        }
    }

}

///////FUNCIONES//////////

function validarFecha($fecha){
    $fechaFormato = DateTime::createFromFormat('Y-m-d', $fecha);
    if($fechaFormato === $fecha){
        return $fecha;
    }else{
        $fechaObj = new DateTime($fecha);
        return $fechaObj->format('Y-m-d');
    }
}

function validarTexto($texto){
    $textoNuevo = strip_tags($texto);
    return htmlspecialchars($textoNuevo);
}

function longitudCritica($critica){
    $critica = htmlspecialchars($critica);
    $limite = 1000;
    if(strlen($critica)>$limite){
        echo '¡Error! La critica tiene demasiados caracteres. (Máximo 1000)';
    }else return $critica;
}

function validarIsmn($ismn){    
    $formato = '/^\d{3}-\d-\d{4}-\d{4}-\d$/';
    if (preg_match($formato, $ismn)) {
        return true;
    } else {
        return false;
    }
}