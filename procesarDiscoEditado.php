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

        $id_disco = $_POST['id_disco'];
        $titulo = validarTexto($_POST['titulo']);
        $interprete = validarTexto($_POST['interprete']);
        $fecha = validarFecha($_POST['fecha']);        
        $puntuacion = 0;

        
        // Si el nuevo ismn es igual que el antiguo, no hace falta validar
        if ($_POST['ismn']===$_POST['ismn_antiguo']){

            $ismn = $_POST['ismn'];          

        } else {
        
            // Si el nuevo ismn es válido, se comprueba que no exista en la BBDD
            if(validarIsmn($_POST['ismn'])){

                if(Disco::comprobarIsmn($_POST['ismn'])){
                    echo '¡Error! El ismn ya existe.';
                    $noCorrecto=1;
                }                
            } else $noCorrecto=1;        
        
        // El ismn es nuevo pero es correcto y no existe en la BBDD
        }  $ismn = $_POST['ismn']; 

        $critica = longitudCritica($_POST['critica']);

        if($noCorrecto==1){

            // Ha habido algún tipo de error de validación, no se introduce en la BBDD
            echo "No se ha podido actualizar el registro, por favor comprueba que los nuevos datos sean corrcetos";
        } else {
         
        
        $disco = new Disco(
            $id_disco,  
            $titulo,
            $interprete,
            $critica,
            $fecha,
            $puntuacion,
            $ismn
        );

        /*
        Disco::ModificarDisco($disco);
        header("Location:todosLosDiscosEdicion.php");
        exit();
        */

        var_dump($disco);

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