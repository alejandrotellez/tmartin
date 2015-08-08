<?php
session_start();
include '../Clases/Slider.php';

$slide = new Slider();

$nombre = $_POST['nombre'];
$url = 'assets/img/slides/'. basename($_FILES['imagen']['name']);

$slide->set_slider($nombre,$url);
$slider1 = $slide->add_slider();

if($slider1 == TRUE){
   $urlbase = '../../assets/img/slides/';
   $newurl = $urlbase . basename($_FILES['imagen']['name']);
   if (move_uploaded_file($_FILES['imagen']['tmp_name'], $newurl)) {
      $message = "El sistema a agregado correctamente una nueva imagen de slider";
         $alert = "success";
      header("Location: ../Configuracion/configpublic.php?alert=$alert&message=$message");
   } else {
      echo "¡Posible ataque de carga de archivos!\n";
   }
}