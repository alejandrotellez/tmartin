<?php
session_start();
include_once '../Clases/Beca.php';
 
$beca = new Beca();

$idBeca = null;
$nombre = $_POST['nombre'];
$porcentaje = $_POST['descuento'];
$descuento = $porcentaje / 100;

if(isset($_POST['idBeca'])){
   $idBeca = $_POST['idBeca'];
}

$beca->set_beca($idBeca,$nombre, $descuento);
$beca1 = $beca->add_beca();

if($beca1 = TRUE){
   $message = "El sistema ha almacenado la información de la beca";
   header("Location: becas.php?alert=success&message=$message");
}else {
    header("Location: index.php");
}

