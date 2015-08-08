<?php

// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
require '../../vendor/autoload.php';

// disable DOMPDF's internal autoloader if you are using Composer
define('DOMPDF_ENABLE_AUTOLOAD', false);

// include DOMPDF's default configuration
require_once '../../vendor/dompdf/dompdf/dompdf_config.inc.php';

//  -------- DATOS PARA UPDATE --------
if(isset($_GET['matricula'])){
   $matricula = $_GET['matricula'];
   include_once '../Clases/Alumno.php';
   $alumno = new Alumno();
   $datos = $alumno->get_alumno($matricula);
   $row = $datos->fetchObject();
   
   include_once '../Clases/Tutor.php';
   $tutor = new Tutor();
   $idTutor = $row->idtutor;
   $datos1 = $tutor->get_tutor($idTutor, null);
   $row1 = $datos1->fetchObject();
   //var_dump($row1);
}

$data = array(
   'matricula' => $row->matricula,
   'nombre' => $row->nombre,
   'a_paterno' => $row->a_paterno,
   'a_materno' => $row->a_materno,
   'sexo' => $row->idsexo,
   'grado' => $row->idgrado,
   'grupo' => $row->idgrupo,
   'escolaridad' => $row->idescolaridad,
   'beca' => $row->idbeca,
   'nombre_tutor' => $row1->nombre,
   'a_paterno_tutor' => $row1->a_paterno,
   'a_materno_tutor' => $row1->a_materno,
   'email_tutor' => $row1->email,
   'telefono_tutor' => $row1->telefono
);

ob_start();
extract($data);
include 'solicitud_pdf.php';
$html = ob_get_clean();
//echo $html;
//exit();

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("ejemplo.pdf");