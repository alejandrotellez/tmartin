<?php
session_start();
include_once 'Beca.php';
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
    header("Location: becas.php");
}  else {
    header("Location: index.php");
}