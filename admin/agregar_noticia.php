<?php
session_start();
include 'Noticia.php';

$noticias = new Noticia();

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$fecha = date("F j, Y");
$url = 'img/noticias/'. basename($_FILES['imagen']['name']);
$descripcion = $_POST['descripcion'];


$noticias->set_noticia($titulo, $autor, $fecha, $url, $descripcion);
$noticias1 = $noticias->add_noticia();


if($noticias1 == TRUE){
   $urlbase = '../img/noticias/';
$newurl = $urlbase . basename($_FILES['imagen']['name']);
   if (move_uploaded_file($_FILES['imagen']['tmp_name'], $newurl)) {
      header("Location: configpublic.php?active=noticias");
   } else {
      echo "¡Posible ataque de carga de archivos!\n";
   }
}