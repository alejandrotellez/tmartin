<?php
session_start();
include_once '../Clases/Year.php';
include_once '../Clases/Ciclo.php';
include_once '../Clases/Gg.php';

$year = $_POST['year'];

$ciclo = $_POST['ciclo'];

$grado = $_POST['grado'];
$grupo = $_POST['grupo'];

//echo $ciclo, $year, $grado, $grupo;

// ------------- OBTENER O AGREGAR YEAR -------------
$year1 = new Year();
$idYear1 = $year1->get_year($year);

if($idYear1 == FALSE){
   $idYear = NULL;
   $year1->set_year($idYear,$year);
   $year1->add_year();
   $idYear1 = $year1->get_year($year);
}

$row = $idYear1->fetchObject();
$idYear = $row->idyear;

// ------------- OBTENER O AGREGAR CICLO -------------
$ciclo1 = new Ciclo();
$idCiclo1 = $ciclo1->get_ciclo($ciclo, $idYear);

if($idCiclo1 == FALSE){
   $idCiclo = null;
   $ciclo1->set_ciclo($idCiclo, $ciclo, $idYear);
   $ciclo1->add_ciclo();
   $idCiclo1 = $ciclo1->get_ciclo($ciclo, $idYear);
}

$row = $idCiclo1->fetchObject();
$idCiclo = $row->idciclo;

$gg = new Gg();
$idGg = 0;
$idgg = $gg->set_gg($idGg,$grado, $grupo);
$idgg2 = $gg->add_gg();


if(isset($idCiclo)){
   $message = "se agrego un nuevo ciclo";
   header("Location: ciclos.php?alert=success&message=$message");
}
