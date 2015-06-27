<?php
session_start();
include_once 'Administrador.php';
$admin = new Administrador();

$idAdministrador = $_GET['idadministrador'];
$datos = $admin->del_administrador($idAdministrador);

if($datos == TRUE){
    $_SESSION['login']="algo";
    header("Location: administradores.php");
}  else {
    header("Location: index.php");
}