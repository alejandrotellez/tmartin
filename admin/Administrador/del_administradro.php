<?php
session_start();
include_once '../Clases/Administrador.php';
$admin = new Administrador();

$idAdministrador = $_GET['idadministrador'];
$datos2 = $admin->get_administrador(null);
$row = $datos2->fetchObject();
$nombre = $row->nombre." ". $row->a_paterno." ". $row->a_materno;
$datos = $admin->del_administrador($idAdministrador);

if($datos == TRUE){
    $message = "El sistema a eliminado al Administrador $nombre";
    header("Location: administradores.php?alert=success&message=$message");
}  else {
    header("Location: index.php");
}