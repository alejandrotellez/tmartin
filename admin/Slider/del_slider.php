<?php
session_start();

include '../Clases/Slider.php';
$slide = new Slider();

if(isset($_GET['idslider'])){
   $idslider = $_GET['idslider'];
   $url = $_GET['url'];
   
   $datos = $slide->del_slider($idslider);
   
   if($datos == TRUE){
      $url1 = "../../".$url;
      if(unlink($url1)){
         $message = "El sistema a eliminado correctamente una nueva imagen de slider";
         $alert = "success";
         header("Location: ../Configuracion/configpublic.php?alert=$alert&message=$message");
      }else{
         header("Location: index.php");
      }
      
   }else{
      header("Location: index.php");
   }
   
}