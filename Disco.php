<?php
include_once "ConectorBBDD.php";

class Disco {

    private $id_disco;

    private $titulo;

    private $interprete;

    private $critica;

    private $fecha_publicacion;

    private $puntuacion;

    private $ismn;


function __construct($id_disco, $titulo, $interprete, $critica, $fecha_publicacion, $puntuacion, $ismn){
    $this->id_disco=$id_disco;
    $this->titulo=$titulo;
    $this->interprete=$interprete;
    $this->critica=$critica;
    $this->fecha_publicacion=$fecha_publicacion;
    $this->puntuacion=$puntuacion;
    $this->ismn=$ismn;  
}


// getters y setters

function getId_disco(){
    return $this->id_disco;
}

function setId_disco($id_disco){
    $this->id_disco=$id_disco;
}

function getTitulo(){
    return $this->titulo;
}

function setTitulo($titulo){
    $this->titulo=$titulo;
}

function getInterprete(){
    return $this->interprete;
}

function setInterprete($interprete){
    $this->titulo=$interprete;
}

function getCritica(){
    return $this->critica;
}

function setCritica($critica){
    $this->critica=$critica;
}

function getFecha_publicacion(){
    return $this->fecha_publicacion;
}

function setFecha_publicacion($fecha_publicacion){
    $this->fecha_publicacion=$fecha_publicacion;
}

function getPuntuacion(){
    return $this->puntuacion;
}

function setPuntuacion($puntuacion){
    $this->puntuacion=$puntuacion;
}

function getIsmn(){
    return $this->ismn;
}

function setIsmn($ismn){
    $this->ismn=$ismn;
}


//////////////// FUNCIONES CRUD ////////////////////

 // Listar TODOS los discos (con puntuaciones medias)

 static function todosLosDiscos()
 {
     $conexion = conectar();

     // Consulta SQL todos los discos de un usuario concreto
     $sql = "select disco.id_disco, disco.titulo, disco.interprete, disco.fecha_publicacion, 
     avg(disco_puntuacion.puntuacion) as puntuacion, disco.critica, disco.ismn from disco 
     left join disco_puntuacion on disco.id_disco = disco_puntuacion.id_disco group by (id_disco)";

     $stmt = $conexion->prepare($sql);

     $stmt->execute();
     $listaDiscos = array();

     while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        
         $disco = new Disco(

         $disco = $row['id_disco'],
         $disco = $row['titulo'],
         $disco = $row['interprete'],
         $disco = $row['critica'],
         $disco = $row['fecha_publicacion'],
         

         // La media de la puntuación puede ser un número decimal.
         // Hay que redonderar la cifra, hacia arriba o hacia abajo
         // dependiendo de la parte decimal.
         
         $disco = (int) round($row['puntuacion'], 0, PHP_ROUND_HALF_UP),         
         $disco = $row['ismn']             
         );   

         array_push($listaDiscos, $disco);                       
     }        

     return $listaDiscos;
 }

 
 // Función que inserta un disco en la BBDD
 static function insertarDisco(Disco $disco)
 {
    $conexion = conectar();

     // Sentencia SQL para insertar un disco nuevo
     $sql = "insert into disco (titulo, fecha_publicacion, critica, ismn, interprete)".
     " values(:titulo, :fecha_publicacion, :critica, :ismn, :interprete)";

     $stmt = $conexion->prepare($sql);
     
     // vincular parámetros     
     $stmt->bindParam(':titulo', $disco->titulo);
     $stmt->bindParam(':fecha_publicacion', $disco->fecha_publicacion);
     $stmt->bindParam(':critica', $disco->critica);
     $stmt->bindParam(':ismn', $disco->ismn);
     $stmt->bindParam(':interprete', $disco->interprete);

     $stmt->execute();    

 }

  // Función que actualiza la puntuación de un disco por un usuario
  static function updatePuntuacion($id_usuario, $id_disco, $puntuacion){

    $conexion = conectar();

     // Sentencia SQL para actualizar
     $sql = "update disco_puntuacion set puntuacion=:puntuacion where id_usuario=:id_usuario and id_disco=:id_disco";
     $stmt = $conexion->prepare($sql);
     
     // vincular parámetros     
     $stmt->bindParam(':id_usuario', $id_usuario);
     $stmt->bindParam(':id_disco', $id_disco);
     $stmt->bindParam(':puntuacion', $puntuacion);

     $stmt->execute();  
  }

  // Función para saber si existe un registro en la tabla disco_puntuación
  // devuelve true o false

  static function consultaRegistro($id_usuario, $id_disco){

    $conexion = conectar();

     // Sentencia SQL para actualizar
     $sql = "select id_usuario, id_disco from disco_puntuacion where id_usuario=:id_usuario and id_disco=:id_disco";
     $stmt = $conexion->prepare($sql);
     
     // vincular parámetros     
     $stmt->bindParam(':id_usuario', $id_usuario);
     $stmt->bindParam(':id_disco', $id_disco);

     $stmt->execute();  
     $usuario=0;
     
     while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        
        $usuario = $row['id_usuario'];
      
     }
      
     if($usuario == null){
            return false;
        }else{
            return true;
        }
     
    }

    // Función para insertar un registro NUEVO en disco_puntuacion

    static function insertPuntuacion($id_usuario, $id_disco, $puntuacion){

        $conexion = conectar();

        // Sentencia SQL para insertar registro en disco_puntuacion
        $sql = "insert into disco_puntuacion (id_usuario, id_disco, puntuacion)".
        " values(:id_usuario, :id_disco, :puntuacion)";
   
        $stmt = $conexion->prepare($sql);
        
        // vincular parámetros     
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':id_disco', $id_disco);
        $stmt->bindParam(':puntuacion', $puntuacion);
           
        $stmt->execute();    
    }


    // Función que comprueba la existencia de un ismn en la BBDD
    static function comprobarIsmn($ismn){

        $conexion = conectar();
    
         // Sentencia SQL para buscar ismn
         $sql = "select ismn from disco where ismn=:ismn";
         $stmt = $conexion->prepare($sql);
         
         // vincular parámetros     
         $stmt->bindParam(':ismn', $ismn);       
    
         $stmt->execute();  
         $ismnEncontrado="";
         
         while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            
            $ismnEncontrado = $row['ismn'];
          
         }
          
         if($ismnEncontrado == ""){
                return false;
            }else{
                return true;
            }
         
        }
    


}
