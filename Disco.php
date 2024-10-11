<?php
class Disco {

    private $id_disco;

    private $titulo;

    private $critica;

    private $fecha_publicacion;

    private $puntuacion;

    private $ismn;


function __construct($id_disco, $titulo, $critica, $fecha_publicacion, $puntuacion, $ismn){
    $this->id_disco=$id_disco;
    $this->titulo=$titulo;
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


}
?>