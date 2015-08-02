<?php
session_start();
include_once '../Clases/Administrador.php';

//crea un nuevo objeto de una clase
//Clase objeto = new Clase()
$admin = new Administrador();

echo $_POST['nombre'];
//$idAdministrador = 1;
$nombre = $_POST['nombre'];
$a_paterno = $_POST['a_paterno'];
$a_materno = $_POST['a_materno'];
$password = $_POST['password'];
$idPrivilegios = $_POST['idPrivilegios'];

if(isset($_POST['idAdministrador'])){
   $idAdministrador = $_POST['idAdministrador'];
   
   $admin->set_administrador($idAdministrador, $nombre, $a_paterno, $a_materno, $password, $idPrivilegios);
$administrador = $admin->update_administrador();
   
}else{
   $administrador = $admin->max_administrador();
   $dato = $administrador->fetchColumn();
   //$matricula1 = date("Y"); 
   //$idAdministrador = $matricula1.$dato;
   $idAdministrador = $dato + 1;
   
   $admin->set_administrador($idAdministrador, $nombre, $a_paterno, $a_materno, $password, $idPrivilegios);
$administrador = $admin->add_administrador();   
}

if($administrador = TRUE){
   $message = "El sistema a agregado correctamente la informacion del Administrador";
    header("Location: administradores.php?alert=success&message=$message");
}  else {
    header("Location: index.php");
}

