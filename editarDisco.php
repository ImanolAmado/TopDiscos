<?php

session_start();

if(!isset($_SESSION['email'])){
   header("Location:index.php");
   exit();
}

if($_SERVER["REQUEST_METHOD"]=="POST"){    
    
    $id_disco = $_POST['id_disco'];
    $titulo = $_POST['titulo'];
    $interprete = $_POST['interprete'];
    $fecha = $_POST['fecha'];
    $ismn = $_POST['ismn'];   
    $critica = $_POST['critica'];    
        
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Editar disco</title>
</head>
<body>

 <!-- Insertamos menú -->
 <?php include_once "vistaMenu.php";?>
    
 <h3>Editar disco</h3>
    <form class="editarDisco" method="post" action="procesarDiscoEditado.php"> 
        
        <label>Introducir datos</label><br><br>

          <label for="titulo">Título: </label><br>
          <input type="text" id="titulo" name="titulo" value="<?php echo $titulo; ?>" required><br>
          <label for="interprete">Interprete: </label><br>
          <input type="text" id="interprete" name="interprete" value="<?php echo $interprete; ?>" required><br>
          <label for="fecha">Fecha publicación: </label><br>
          <input type="date" id="fecha" name="fecha" value="<?php echo $fecha; ?>" required><br>
          <label for="ismn">ISMN (formato xxx-x-xxxx-xxxx-x) </label><br>
          <input type="text" id="ismn" name="ismn" value="<?php echo $ismn; ?>" required><br>
          <label for="critica">Crítica: </label><br>
          <textarea id="critica" name="critica" rows="5" cols="40" required><?php echo $critica; ?></textarea><br><br>          
          <input type="hidden" id="id_disco" name="id_disco" value="<?php echo $id_disco; ?>">
          <input type="hidden" id="ismn_antiguo" name="ismn_antiguo" value="<?php echo $ismn; ?>">

        <input type="submit" value ="Actualizar">
    </form><br><br>  

   
<?php include_once "vistaFooter.php";?>