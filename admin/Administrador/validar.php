<?php
session_start();
include_once '../Clases/Administrador.php';

//crea un nuevo objeto de una clase
//Clase objeto = new Clase()
$admin = new Administrador();

$idAdministrador= $_POST['matricula'];
$password= $_POST['password'];

$administrador = $admin->login_administrador($idAdministrador, $password);


$datos = $admin->get_administrador($idAdministrador);
if($datos == false){
   $message = "Usuario o contraseña incorrectos";
   header("Location: login.php?error=1&message=$message");
}
$row = $datos->fetchObject();

include_once '../Clases/Privilegios.php';
$privilegios = new Privilegios();
$datos2 = $privilegios->get_privilegios($row->idprivilegios);

while ($row2 = $datos2->fetchObject()){
   if($row->idprivilegios==$row2->idprivilegios){
      $privilegios=$row2->privilegios;
   }
} 

if($administrador == TRUE){
   $_SESSION['login']="algo";
   $_SESSION['idAdministrador'] = $row->idadministrador;
   $_SESSION['nombre'] = $row->nombre." ".$row->a_paterno." ".$row->a_materno;
   $_SESSION['privilegios']=$privilegios;
   $_SESSION['password']=$row->password;

   header("Location: ../index.php");
}  else {
   $message = "Usuario o contraseña incorrectos";
   header("Location: login.php?error=1&message=$message");
}