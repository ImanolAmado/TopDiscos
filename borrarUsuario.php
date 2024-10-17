<?php
session_start();
include_once "Usuario.php";

if(!isset($_SESSION['email'])){
    header("Location:index.php");
    exit();
 }


