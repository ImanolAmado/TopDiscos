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

    function getI_usuario()
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
        
        if($resultado == null){
            echo 'No se ha encontrado el usuario';
        }else{
            return $resultado;
        }
    }


    // Listar los discos (puntuaciones) de un usuario

    static function discosUsuario($id_usuario)
    {
        $conexion = conectar();

        // Consulta SQL todos los discos de un usuario concreto
        $sql = "select id_disco, titulo, interprete, fecha_publicacion, puntuacion, critica, ismn from disco".
        " natural join disco_puntuacion natural join usuario".
        " where usuario.id_usuario = :id_usuario";

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

}