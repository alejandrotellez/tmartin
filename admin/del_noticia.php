<?php
session_start();

include 'Noticia.php';
$noticias = new Noticia();

if(isset($_GET['idnoticia'])){
   $idnoticia = $_GET['idnoticia'];
   $urlimagen = $_GET['urlimagen'];
   
   $datos = $noticias->del_noticia($idnoticia);
   
   if($datos == TRUE){
      $url1 = "../".$urlimagen;
      if(unlink($url1)){
         header("Location: configpublic.php?active=noticias");
      }else{
         header("Location: index.php");
      }
      
   }else{
      header("Location: index.php");
   }
   
}