<?php
session_start();
include 'Slider.php';

$slide = new Slider();

$nombre = $_POST['nombre'];
$url = 'img/slides/'. basename($_FILES['imagen']['name']);

$slide->set_slider($nombre,$url);
$slider1 = $slide->add_slider();

if($slider1 == TRUE){
   $urlbase = '../img/slides/';
$newurl = $urlbase . basename($_FILES['imagen']['name']);
   if (move_uploaded_file($_FILES['imagen']['tmp_name'], $newurl)) {
      header("Location: configpublic.php");
   } else {
      echo "¡Posible ataque de carga de archivos!\n";
   }
}