<?php
include_once "ConectorBBDD.php";
include_once "Disco.php";

class Usuario
{
    private $id_usuario;
    private $nombre;
    private $password;
    private $email;
    private $rol;

    function __construct($id_usuario, $nombre, $password, $email, $rol)
    {
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
        $this->password = $password;
        $this->email = $email;
        $this->rol = $rol;
    }

    //Getters y Setters

    function getId_usuario()
    {
        return $this->id_usuario;
    }
    function getNombre()
    {
        return $this->nombre;
    }
    function getPassword()
    {
        return $this->password;
    }
    function getEmail()
    {
        return $this->email;
    }
    function getRol()
    {
        return $this->rol;
    }
    function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }
    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    function setPassword($password)
    {
        $this->password = $password;
    }
    function setEmail($email)
    {
        $this->email = $email;
    }
    function setRol($rol)
    {
        $this->rol = $rol;
    }


    ///////// FUNCIONES CRUD //////////////

    // Login de usuario
    static function loginUsuario($emailIntroducido)
    {
        $conexion = conectar();

        // Consulta SQL login
        $sql = "select id_usuario, password, email, rol, nombre from usuario where email = :email";

        $stmt = $conexion->prepare($sql);

        // vincular parámetros     
        $stmt->bindParam(':email',  $emailIntroducido);

        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $resultado;
        
    }


    // Listar los discos (puntuaciones) de un usuario

    static function discosUsuario($id_usuario)
    {
        $conexion = conectar();

        // Consulta SQL todos los discos de un usuario concreto
        $sql = "select disco.id_disco, disco.titulo, disco.interprete, disco.fecha_publicacion, disco_puntuacion.puntuacion, disco.critica, disco.ismn from  disco
        left join disco_puntuacion on disco.id_disco = disco_puntuacion.id_disco and disco_puntuacion.id_usuario = :id_usuario where disco.id_disco is not null
        order by disco_puntuacion.puntuacion desc";
               

        $stmt = $conexion->prepare($sql);

        // vincular parámetros     
        $stmt->bindParam(':id_usuario',  $id_usuario);

        $stmt->execute();        

        $listaDiscos = array();

        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
           
            $disco = new Disco(

            $disco = $row['id_disco'],
            $disco = $row['titulo'],
            $disco = $row['interprete'],
            $disco = $row['critica'],
            $disco = $row['fecha_publicacion'],
            $disco = $row['puntuacion'],           
            $disco = $row['ismn']             
            );   

            array_push($listaDiscos, $disco);                       
        }        

        return $listaDiscos;
    }        

    // Función que devuelve todos los usuarios

    static function todosLosUsuarios()
    {
     $conexion = conectar();

     // Consulta SQL todos los discos de un usuario concreto
     $sql = "select * from usuario";

     $stmt = $conexion->prepare($sql);

     $stmt->execute();
     $listaUsuarios = array();

     while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        
         $usuario = new Usuario(

         $id_usuario = $row['id_usuario'],
         $nombre = $row['nombre'],
         $password = $row['password'],
         $email = $row['email'],
         $rol = $row['rol'],

         );   

         array_push($listaUsuarios, $usuario);                       
     }        

     return $listaUsuarios;
 }

 // Función que inserta un usuario en la BBDD
 static function insertarUsuario(Usuario $usuario)
 {
    $conexion = conectar();

     // Sentencia SQL para insertar un disco nuevo
     $sql = "insert into usuario (nombre, password, email, rol)".
     " values(:nombre, :password, :email, :rol)";

     $stmt = $conexion->prepare($sql);
     
     // vincular parámetros     
     $stmt->bindParam(':nombre', $usuario->nombre);
     $stmt->bindParam(':password', $usuario->password);
     $stmt->bindParam(':email', $usuario->email);
     $stmt->bindParam(':rol', $usuario->rol);
     
     $stmt->execute();    

 }


 static function eliminarUsuario($id_usuario){
    
    $conexion = conectar();

    // Sentencia SQL para eliminar un usuario
    $sql = "delete from usuario where id_usuario=:id_usuario";

    $stmt = $conexion->prepare($sql);
    
    // vincular parámetros     
    $stmt->bindParam(':id_usuario', $id_usuario);
       
    $stmt->execute();    

 }

 //Funcion que comprara los emails
 static function compararEmails($email){
    $conexion = conectar();

    // Sentencia SQL para comparar emails
    $sql = "select email from usuario where email = :email";
    $stmt = $conexion->prepare($sql); 

    $stmt->bindParam(':email', $email);
    $stmt->execute();  
    $encontrado=0;

    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        $encontrado =  $row['email'];
     }
     if($encontrado == null){
         return false;
     }else{
         return true;
     }
 }

}