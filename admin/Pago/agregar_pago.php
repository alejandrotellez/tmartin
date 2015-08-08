<?php
// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
require '../../vendor/autoload.php';

// disable DOMPDF's internal autoloader if you are using Composer
define('DOMPDF_ENABLE_AUTOLOAD', false);

// include DOMPDF's default configuration
require_once '../../vendor/dompdf/dompdf/dompdf_config.inc.php';

session_start();
include_once '../Clases/Pago1.php';

if(!isset($_POST['matricula'])){
   header("Location: pagos.php");
}else{
   $nuevoresultado = new Pago1();
   $matricula = $_POST['matricula'];
   $folio = 0;
   $fechaactual= date("Y-m-d", strtotime('-1 day'));
   $limite = 10;
   $fechalimite = date("Y-m")."-10";
   $diaactual = date("d");
   $idAdministrador= $_SESSION['idAdministrador'];
   $subtotal = 0;
   $recargo= 5;
   $recargos = 0;
   $colegiatura = 1500;
   $date_m = array(

      "1" => "August",
      "2" => "August",
      "3" => "September",
      "4" => "October",
      "5" => "November",
      "6" => "December",
      "7" => "January",
      "8" => "January",
      "9" => "February",
      "10" => "March",
      "11" => "April",
      "12" => "May",
      "13" => "June"   
   );
   $date_m2 = array(

      "1" => "inscripcion",
      "2" => "agosto",
      "3" => "septiembre",
      "4" => "octubre",
      "5" => "noviembre",
      "6" => "diciembre",
      "7" => "reinscripcion",
      "8" => "enero",
      "9" => "febrero",
      "10" => "marzo",
      "11" => "abril",
      "12" => "mayo",
      "13" => "junio"
   );


   if(!empty($_POST['mes'])){

      foreach($_POST['mes'] as $mes){

         foreach($date_m as $num_mes=>$mes_in){
            $mes_actual = date("F");
            if($mes_actual == $mes_in){
               $num_mes_in = $num_mes;
            }
         }

         foreach($date_m2 as $num_mes2=>$mes_es){
            if($mes == $mes_es){
               $num_mes_es = $num_mes2;
            }
         }

         if($num_mes_es <= $num_mes_in){
            if($num_mes_es == $num_mes_in or 1<2 or 7<8){
               if($diaactual > $limite){
                  $recargos = ($diaactual-$limite)*$recargo;
               }
            }else{
               $recargos = 30 *$recargo;
            }
         }
         $subtotal1 = $subtotal + $colegiatura + $recargos;
         $pagos = $subtotal1;   
         
         $pago_folio1 = $nuevoresultado->get_folio();
      while ($pago_folio = $pago_folio1->fetchObject()){
         $folio1 = $pago_folio->folio;
         $nota = $folio1 + 1;
      }

         //agregar pago
         $pagohecho = $nuevoresultado->add_pago($folio, $mes, $fechaactual, $fechalimite, $recargos, $pagos, $matricula, $idAdministrador, $folio);

         //echo $folio." | ".$mes." | ".$fechaactual." | ".$fechalimite." | ".$recargos." | ".$pagos." | ".$matricula." | ".$idAdministrador."</br>";

      }
   }
   
   //hacer pdf del recibo
   if($pagohecho = TRUE){

      include_once '../Clases/Alumno.php';
      $alumno = new Alumno();
      $datos = $alumno->get_alumno($matricula);
      $row = $datos->fetchObject();
      //var_dump ($row);

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

      include_once '../Clases/Escolaridad.php';
      $escolaridad = new Escolaridad();
      $escolaridad1 = $escolaridad->get_escolaridad();      
      while ($escolaridad2 = $escolaridad1->fetchObject()){
         if($row->idescolaridad == $escolaridad2->idescolaridad){
            $escolaridad3 = $escolaridad2->escolaridad;
         }

      }

      include_once '../Clases/Beca.php';
      $becas = new Beca();
      $becas1 = $becas->get_beca();      
      while ($becas2 = $becas1->fetchObject()){
         if($row->idbeca==$becas2->idbeca){
            $descuento1 = $becas2->descuento*$colegiatura;
            $descuento = number_format($descuento1, 2, '.', ' ');
         }         
      }

      $meses = $_POST['mes'];
      $fecha_actual = date("Y-m-d", strtotime('-1 day'));
      
      

      $date_m = array(

         "1" => "August",
         "2" => "August",
         "3" => "September",
         "4" => "October",
         "5" => "November",
         "6" => "December",
         "7" => "January",
         "8" => "January",
         "9" => "February",
         "10" => "March",
         "11" => "April",
         "12" => "May",
         "13" => "June"   
      );
      $date_m2 = array(

         "1" => "inscripcion",
         "2" => "agosto",
         "3" => "septiembre",
         "4" => "octubre",
         "5" => "noviembre",
         "6" => "diciembre",
         "7" => "reinscripcion",
         "8" => "enero",
         "9" => "febrero",
         "10" => "marzo",
         "11" => "abril",
         "12" => "mayo",
         "13" => "junio"
      );


      $data = array(
         'matricula' => $matricula,
         'mes' => $meses,
         'fecha_actual' => $fecha_actual,
         'nombre' => $row->nombre,
         'a_paterno' => $row->a_paterno,
         'a_materno' => $row->a_materno,
         'grado3' => $grado3,
         'grupo3' => $grupo3,
         'escolaridad3' => $escolaridad3,
         'idescolaridad' => $row->idescolaridad,
         'descuento' => $descuento,
         'idbeca' => $row->idbeca,
         'colegiatura' => 1500,
         'a' => 0,
         'subtotal' => 0,
         'diaactual' => date("d"),
         'limite' => 10,
         'recargo' => 5,
         'subtotal2' => 0,
         'date_m' => $date_m,
         'date_m2' => $date_m2,
         'nota' => $nota
      );

      //var_dump($data);

      ob_start();
      extract($data);
      include 'recibo_pdf.php';
      $html = ob_get_clean();
      //echo $html;
      //exit;

      $dompdf = new DOMPDF();
      $dompdf->load_html($html);
      $dompdf->render();
      $dompdf->stream("recibo.pdf");

      $message = "se realizo el pago";
      header("Location: pagos.php?alert=success&message=$message");

   }else {
      header("Location: index.php");
   }

}