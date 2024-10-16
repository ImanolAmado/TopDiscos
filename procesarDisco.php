<?php
session_start();
include_once "Disco.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){    
    
    if(empty ($_POST['titulo']) || empty ($_POST['interprete']) || empty ($_POST['fecha']) || empty ($_POST['ismn']) || empty ($_POST['critica'])){

        echo "¡Error! Ningún campo del login puede estra vacío";   
              
    } else {

        // para hashear contraseñas:
        // https://onlinephp.io/password-hash    

        $idDiscoIntroducido = 0;
        $tituloIntroducido = validarTexto($_POST['titulo']);
        $interpreteIntroducido = validarTexto($_POST['interprete']);
        $fechaIntroducida = validarFecha($_POST['fecha']);
        $ismnIntroducido = validarIsmn($_POST['ismn']);
        $criticaIntroducida = longitudCritica($_POST['critica']);
        $puntuacionIntroducida = 0;


        if(Disco::comprobacionIsmn($ismnIntroducido)){
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

        if (Disco::insertarDisco($disco)) {
            echo "¡Disco insertado correctamente!";
        } else {
            echo "Error al insertar el disco.";
        }
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
        echo '¡Error! La critica tiene demasiados caracteres. (Máximo 2000)';
    }else return $critica;
}

function validarIsmn($ismn){
    $ismn=htmlspecialchars($ismn);
    $formato = '/^\d{3}-\d-\d{4}-\d{4}-\d$/';
    if (preg_match($formato, $ismn)) {
        return "Formato válido";
    } else {
        return "Formato inválido";
    }
}