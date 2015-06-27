<?php
session_start();
include_once 'Alumno.php';
$alumno = new Alumno();

$matricula = $_GET['matricula'];
$datos = $alumno->del_alumno($matricula);

if($datos == TRUE){
    $_SESSION['login']="algo";
    header("Location: alumnos.php");
}  else {
    header("Location: index.php");
}