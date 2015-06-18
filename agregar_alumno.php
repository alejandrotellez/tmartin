<?php
session_start();
include_once 'Alumno.php';
include_once 'Tutor.php';
include_once 'Alumno1.php';

if(!isset($_POST['nombre_tutor'])){
   header("Location: frm_alumno.php");
}else{
   $tutor = new Tutor();   

// -------------- Variables de Tutor --------------
$idTutor1 = null;
$nombre_tutor = $_POST['nombre_tutor'];
$a_paterno_tutor = $_POST['a_paterno_tutor'];
$a_materno_tutor = $_POST['a_materno_tutor'];   
$email_tutor = $_POST['email_tutor'];
$telefono_tutor = $_POST['telefono_tutor'];


$Tutor = $tutor->get_tutor($idTutor1, $email_tutor);

if($Tutor != null){
   $idTutor1 = $Tutor->fetchObject();
   $idTutor = $idTutor1->idtutor;
}else{
   $idTutor = $_POST['idAdministrador'];
}
   
$tutor->set_tutor($idTutor, $a_paterno_tutor, $a_materno_tutor, $nombre_tutor, $email_tutor, $telefono_tutor);
$newtutor = $tutor->add_tutor();

if($Tutor != null){
   $Tutor = $tutor->get_tutor($idTutor1, $email_tutor);
   $idTutor2 = $Tutor->fetchObject();
   $idTutor3 = $idTutor2->idtutor;
}


if($newtutor == TRUE){
   
   $alumno = new Alumno();

   // -------------- Variables de Alumno --------------
   $alumno1 = $alumno->max_alumno();
   $dato = $alumno1->fetchColumn();
   //$matricula1 = date("Y"); 
   //$idAdministrador = $matricula1.$dato;
   $matricula = $dato + 1;
   
   $nombre = $_POST['nombre'];
   $a_paterno = $_POST['a_paterno'];
   $a_materno = $_POST['a_materno'];

   $idSexo = $_POST['sexo'];
   $idEstatus = $_POST['estatus'];
   $idGg = null;
   $idEscolaridad = $_POST['escolaridad'];   
   $idBeca = $_POST['beca'];
   $idGrado = $_POST['grado'];
   $idGrupo = $_POST['grupo'];
   
   var_dump($matricula);

   $newalumno = $alumnos->add_alumno($matricula, $a_paterno, $a_materno, $nombre, $idSexo, $idEstatus, $idGg, $idEscolaridad, $idTutor3, $idBeca,$idGrado, $idGrupo);
   
   var_dump($newalumno);
}
}
