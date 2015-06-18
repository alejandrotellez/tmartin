<?php
session_start();
include_once 'Administrador.php';

//crea un nuevo objeto de una clase
//Clase objeto = new Clase()
$admin = new Administrador();

$idAdministrador= $_POST['matricula'];
$password= $_POST['password'];

$administrador = $admin->login_administrador($idAdministrador, $password);


$datos = $admin->get_administrador($idAdministrador);
$row = $datos->fetchObject();

if($row->privilegios == "1"){
   $privilegios="Administrativo";
}
if($row->privilegios == "2"){
   $privilegios="Eliminar";
}
if($row->privilegios == "3"){
   $privilegios="Actualizar";
}
if($row->privilegios == "4"){
   $privilegios="Administrativo";
}

if($administrador == TRUE){
    $_SESSION['login']="algo";
   $_SESSION['idAdministrador'] = $row->idadministrador;
   $_SESSION['nombre'] = $row->nombre." ".$row->a_paterno." ".$row->a_materno;
   $_SESSION['privilegios']=$privilegios;
   $_SESSION['password']=$row->password;

    header("Location: index.php");
}  else {
    header("Location: login.php");
}