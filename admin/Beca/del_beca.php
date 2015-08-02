<?php
session_start();
include_once '../Clases/Beca.php';
$beca = new Beca();

if(isset($_GET['nombre'])){
   $idBeca = $_GET['nombre'];
   $datos = $beca->get_beca(null, $idBeca);
   $row = $datos->fetchObject();
   $idBeca = $row->idbeca;
}

if(isset($_GET['idBeca'])){
   $idBeca = $_GET['idBeca'];
}

$datos = $beca->del_beca($idBeca);

if($datos == TRUE){
   $message = "El sistema ha eliminado la beca $row->nombre";
   header("Location: becas.php?alert=success&message=$message");
}  else {
   header("Location: index.php");
}