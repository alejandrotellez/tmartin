<?php
session_start();
include '../Clases/Noticia.php';

$noticias = new Noticia();

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$fecha = date("F j, Y");
$url = 'assets/img/noticias/'. basename($_FILES['imagen']['name']);
$descripcion = $_POST['descripcion'];


$noticias->set_noticia($titulo, $autor, $fecha, $url, $descripcion);
$noticias1 = $noticias->add_noticia();


if($noticias1 == TRUE){
   $urlbase = '../../assets/img/noticias/';
$newurl = $urlbase . basename($_FILES['imagen']['name']);
   if (move_uploaded_file($_FILES['imagen']['tmp_name'], $newurl)) {
      $message = "El sistema a agregado correctamente una nueva noticia";
         $alert = "success";
      header("Location: ../Configuracion/configpublic.php?active=noticias&alert=$alert&message=$message");
   } else {
      echo "¡Posible ataque de carga de archivos!\n";
   }
}