<?php
session_start();
include_once 'Administrador.php';

//crea un nuevo objeto de una clase
//Clase objeto = new Clase()
$admin = new Administrador();

$idAdministrador= $_POST['matricula'];
$password= $_POST['password'];

$administrador = $admin->login_administrador($idAdministrador, $password);

if($administrador == TRUE){
    $_SESSION['login']="algo";
    header("Location: index.php");
}  else {
    header("Location: login.php");
}