<?php
include_once "ConectorBBDD.php";

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

    static function loginUsuario($emailIntroducido)
    {
        $conexion = conectar();

        // Consulta SQL login
        $sql = "select password, email, rol, usuario from usuario where email = :email";

        $stmt = $conexion->prepare($sql);

        // vincular parámetros     
        $stmt->bindParam(':email',  $emailIntroducido);

        $stmt->execute();
        $resultados = $stmt->fetch(PDO::FETCH_ASSOC);

        
        if($resultados == null){
            echo 'No se ha encontrado el usuario';
        }else{
            return $resultados;
        }
    }
}