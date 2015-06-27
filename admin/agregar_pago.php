<?php
session_start();
include_once 'Pago1.php';



if(isset($_POST['matricula'])){
   header("Location: pagos.php");
}else{
   $nuevoresultado = new Pago1();
   $matricula = $_POST['matricula'];
   $folio = 0;
   $fechaactual= date("Y-m-d H:i:s");
   $limite = 10;
   $fechalimite = date("Y-m")."-10 ".date("H:i:s");
   $diaactual = date("d");
   $idAdministrador= $_SESSION['idAdministrador'];

   if(!empty($_POST['mes'])){

      foreach($_POST['mes'] as $mes){
         
         if($diaactual <= $limite){
            
            $recargos = 0;
            
         }else{
            
            $recargos = ($diaactual-$limite)*5;
            
         }
         
         $pagos = 1500 + $recargos;

         $pagohecho = $nuevoresultado->add_pago($folio, $mes, $fechaactual, $fechalimite, $recargos, $pagos, $matricula, $idAdministrador);

         //echo $folio." | ".$mes." | ".$fechaactual." | ".$fechalimite." | ".$recargos." | ".$pagos." | ".$matricula." | ".$idAdministrador."</br>";

      }
   }

   if($pagohecho = TRUE){
      header("Location: pagos.php");
   }else {
      header("Location: index.php");
   }

}