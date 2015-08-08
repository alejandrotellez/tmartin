<?php
session_start();

include '../Clases/Noticia.php';
$noticias = new Noticia();

if(isset($_GET['idnoticia'])){
   $idnoticia = $_GET['idnoticia'];
   $urlimagen = $_GET['urlimagen'];
   
   $datos = $noticias->del_noticia($idnoticia);
   
   if($datos == TRUE){
      $url1 = "../../".$urlimagen;
      if(unlink($url1)){
         $message = "El sistema a eliminado correctamente una nueva noticia";
         $alert = "success";
         header("Location: ../Configuracion/configpublic.php?active=noticias&alert=$alert&message=$message");
      }else{
         header("Location: index.php");
      }
      
   }else{
      header("Location: index.php");
   }
   
}