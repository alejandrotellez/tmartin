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


include_once '../Clases/Grado.php';
$grado = new Grado();
$grado1 = $grado->get_grado();
while ($grado2 = $grado1->fetchObject()){
   if($row->idgrado == $grado2->idgrado)
      $grado3 = $grado2->grado;
}


include_once '../Clases/Grupo.php';
$grupo = new Grupo();
$grupo1 = $grupo->get_grupo();
while ($grupo2 = $grupo1->fetchObject()){
   if($row->idgrupo == $grupo2->idgrupo)
      $grupo3 = $grupo2->grupo;
}

include_once '../Clases/Sexo.php';
$sexo = new Sexo();
$sexo1 = $sexo->get_sexo();
while ($sexo2 = $sexo1->fetchObject()){
   if($row->idsexo == $sexo2->idsexo)
      $sexo3 = $sexo2->sexo;
}

include_once '../Clases/Escolaridad.php';
$escolaridad = new Escolaridad();
$escolaridad1 = $escolaridad->get_escolaridad();      
while ($escolaridad2 = $escolaridad1->fetchObject()){
         if($row->idescolaridad == $escolaridad2->idescolaridad){
            $escolaridad3 = $escolaridad2->escolaridad;
         }

      }

   $fecha_actual = date("Y-m-d", strtotime('-1 day'));

   $data = array(
      'matricula' => $row->matricula,
      'nombre' => $row->nombre,
      'a_paterno' => $row->a_paterno,
      'a_materno' => $row->a_materno,
      'sexo' => $sexo3,
      'grado3' => $grado3,
         'grupo3' => $grupo3,
         'escolaridad3' => $escolaridad3,
      'beca' => $row->idbeca,
      'nombre_tutor' => $row1->nombre,
      'a_paterno_tutor' => $row1->a_paterno,
      'a_materno_tutor' => $row1->a_materno,
      'email_tutor' => $row1->email,
      'telefono_tutor' => $row1->telefono,
      'fecha_actual' => $fecha_actual
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