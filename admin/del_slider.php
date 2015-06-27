<?php
session_start();

include 'Slider.php';
$slide = new Slider();

if(isset($_GET['idslider'])){
   $idslider = $_GET['idslider'];
   $url = $_GET['url'];
   
   $datos = $slide->del_slider($idslider);
   
   if($datos == TRUE){
      $url1 = "../".$url;
      if(unlink($url1)){
         header("Location: configpublic.php");
      }else{
         header("Location: index.php");
      }
      
   }else{
      header("Location: index.php");
   }
   
}