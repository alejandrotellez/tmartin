<?php
session_start();
include_once '../Clases/Alumno.php';
$alumno = new Alumno();

include_once '../Clases/Estatus.php';
$estatus = new Estatus();
$datos = $estatus->get_estatus(null, 'INACTIVO');
$row = $datos->fetchObject();

$idestatus = $row->idestatus;
$matricula = $_GET['matricula'];

$datos1 = $alumno->get_alumno($matricula);
$row1 = $datos1->fetchObject();
$nombre = $nombre=$row1->nombre." ".$row1->a_paterno." ".$row1->a_materno;
   
$datos2 = $alumno->exclude_alumno($matricula, $idestatus);

if($datos2 == TRUE){
    header("Location: alumnos.php?option=3&nombre=$nombre");
}  else {
    header("Location: ../index.php");
}