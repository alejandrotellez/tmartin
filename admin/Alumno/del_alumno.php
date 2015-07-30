<?php
session_start();
include_once '../Clases/Alumno.php';
$alumno = new Alumno();

$matricula = $_GET['matricula'];

$datos = $alumno->get_alumno($matricula);
$row = $datos->fetchObject();
$nombre = $nombre=$row->nombre." ".$row->a_paterno." ".$row->nombrea_materno;
   
$datos = $alumno->del_alumno($matricula);

if($datos == TRUE){
    $_SESSION['login']="algo";
    header("Location: alumnos.php?option=1&nombre=$nombre");
}  else {
    header("Location: ../index.php");
}