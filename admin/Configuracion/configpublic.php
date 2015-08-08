<?php

//  -------- Inicio de sesión --------
session_start();
if(!isset($_SESSION['login'])){
   header("Location: login.php");
}

//  -------- Get Slider --------
include_once '../Clases/Slider.php';
$slide = new Slider();
$datos = $slide->get_slider(null);

//  -------- Get Noticias --------
include_once '../Clases/Noticia.php';
$noticias = new Noticia();
$datos1 = $noticias->get_noticia(null);


?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <title>TERESA MARTIN</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <link rel="shortcut icon" href="../../assets/img/ico/favicon.png">

     <!-- CSS DE BOOTSTRAP -->
      <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="../../assets/css/bootstrap-responsive.min.css" rel="stylesheet">
      <!-- CSS DE PLANTILLA -->
      <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
      <link href="../../assets/css/font-awesome2.css" rel="stylesheet">
      <link href="../../assets/css/style.css" rel="stylesheet">
      <link href="../../assets/css/pages/dashboard.css" rel="stylesheet">
      <!-- CSS DE AAA Y ASOCIADOS -->
      <link href="../../assets/css/styleAAA.css" rel="stylesheet">

   </head> 
   <body>

      <!-- ==================================================
MENU SECUNDARIO 
=================================================== --> 
      <div class="navbar navbar-fixed-top">
         <div class="navbar-inner">
            <div class="container"> 
               <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                  <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
               </a>
               <a class="brand" href="index.php">TERESA MARTIN </a>
               <div class="nav-collapse">
                  <ul class="nav pull-right">
                    <li>
                        <a href="../index.php" ><i class="icon-home"></i>&nbsp;Página Publicitaria<b class="caret"></b></a>
                     </li>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i>&nbsp;<?php echo $_SESSION['nombre']?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                           <li><a href="javascript:;"><i class="icon-cog"></i><span>   Configuración </span></a></li>
                           <li><a href="login.php"><i class="icon-off"></i><span>   Cerrar Sesion </span></a></li>
                        </ul>
                     </li>
                  </ul>
                  <form class="navbar-search pull-right">
                     <input type="text" class="search-query" placeholder="Buscar">
                  </form>
               </div>
               <!--/.nav-collapse --> 
            </div>
            <!-- /container --> 
         </div>
         <!-- /navbar-inner --> 
      </div>
      <!-- /navbar -->

      <!-- ==================================================
MENU PRINCIPAL 
=================================================== --> 
      <div class="subnavbar">
         <div class="subnavbar-inner">
            <div class="container">
               <ul class="mainnav">
                  <li><a href="../index.php"><i class="icon-home"></i><span>Inicio</span> </a> </li>
                  <li><a href="../Alumno/alumnos.php"><i class=" icon-user"></i><span>Alumnos</span> </a> </li>
                  <li><a href="../Pago/pagos.php"><i class=" icon-money"></i><span>Pagos</span> </a> </li>
                  <li><a href="../Reportes/reportes.php"><i class="icon-list-alt"></i><span>Reportes</span> </a> </li>
                  <li><a href="../Beca/becas.php"><i class=" icon-bookmark"></i><span>Becas</span> </a> </li>
                  <li><a href="../Ciclo/ciclos.php"><i class=" icon-refresh"></i><span>Ciclos</span> </a> </li>
                  <?php
   $root = "Root";
   if($_SESSION['privilegios']== $root){?>
      <li><a href="../Administrador/administradores.php"><i class=" icon-user"></i><span>Administradores</span> </a> </li>
  <?php }
                  ?> 
                  <li  class="active"><a href="configpublic.php"><i class="icon-cog"></i><span>Pagina Publicitaria</span> </a> </li>
               </ul>
            </div>
            <!-- /container --> 
         </div>
         <!-- /subnavbar-inner --> 
      </div>
      <!-- /subnavbar -->

      <!-- ==================================================
CONTENIDO 
==================================================== -->


      <div class="main">
         <div class="main-inner">
            <div class="container">
               <div class="row">
                  <div class="span12">
                    
                    <!-- Alerta -->
                     <?php 
   if(isset($_GET['alert'])){
   $success = "success";
   if($_GET['alert']==$success){?>
                     <div id="eliminar" class="alert alert-success alert-dismissible" role="alert">
                        <a href="#" type="button" class="close" data-dismiss="alert" aria-label="Close"><i class=" icon-remove"></i></a>
                        <?php echo $_GET['message'];?>
                     </div>
                     <?php
                               }

}
                     ?>
                    
                     <div class="widget ">
                        <div class="widget-header">
                           <i class="icon-user"></i>
                           <h3>Configuración de la Página Publicitaria</h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">
                           <div class="tabbable">
                              <ul class="nav nav-tabs" id="nav-configpublic">
                                 <li class="active">
                                    <a href="#slider" data-toggle="tab">Slider</a>
                                 </li>
                                 <li><a href="#noticias" data-toggle="tab">Noticias</a></li>
                              </ul>
                              <br>
                              <div class="tab-content">

                                 <!-- /CONFIGURACION DE SLIDER -->
                                 <div class="tab-pane <?php if(!isset($_GET['active'])){echo "active";}?>" id="slider">
                                    <div class="container">
                                       <div class="row">
                                          <div class="span12 configpublic">
                                             <a href="#" class="shortcut btn btn-info" data-toggle="modal" data-target="#nuevoslider">
                                                <i class="shortcut-icon icon-search"></i> 
                                                <span class="shortcut-label">Nuevo Slider</span>
                                             </a>
                                             <br>

                                             <!-- ============== MODAL NUEVO SLIDER ============== -->
                                             <div class="modal fade" id="nuevoslider" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                   <div class="modal-content">
                                                      <div class="modal-header">
                                                         <a class="close" data-dismiss="modal" aria-label="Close"><i class=" icon-remove"></i></a>
                                                         <h4 class="modal-title" id="myModalLabel">Agregar nuevo slider</h4>
                                                      </div>
                                                      <form enctype="multipart/form-data" action="../Slider/agregar_slider.php" method="post" class="form-horizontal valialum" >
                                                         <div class="modal-body">
                                                            <div class="control-group">											
                                                               <label class="control-label" for="nombre">Nombre de la Imagen</label>
                                                               <div class="controls">  
                                                                  <input type='text' class='span3 disabled form-control' name='nombre' id='nombre' data-validate='validate(required, rangelength(1,25))'>
                                                               </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                               <label class="control-label" for="imagen">Imagen</label>
                                                               <div class="controls">  
                                                                  <input type='file' class='span3 disabled form-control' name='imagen' id='imagen' data-validate='validate(required, rangelength(1,25))'>
                                                                  <p class="help-block">La imagen debe medir 1600x686px</p>
                                                               </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->  
                                                         </div>
                                                         <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                                         </div>
                                                      </form>

                                                   </div>
                                                </div>
                                             </div>
                                             <!-- ============== TABLA DE SLIDERS ============== -->
                                             <table class="table table-striped table-bordered get_table table_configpublic"  id="">
                                                <thead>
                                                   <tr>
                                                      <th> Imagen </th>
                                                      <th> Nombre </th>
                                                      <th class="td-actions">Accion </th>
                                                   </tr>
                                                </thead>
                                                <tbody><?php
while ($row = $datos->fetchObject()){
                                 ?><tr>
                                                   <td><img src="../../<?php echo $row->url;?>" class="img-responsive img-rounded" alt=""></td>
                                                   <td><?php echo $row->nombre;?></td>
                                                   <td>
                                                      <span id="tooltip-ver" class="input-group-addon mitooltip" title="Eliminar Slider" data-placement="top">
                                                         <a class="btn btn-bigger btn-invert" href="../Slider/del_slider.php?idslider=<?php echo $row->idslider;?>&url=<?php echo $row->url;?>">
                                                            <i class="btn-icon-only icon-trash"> </i>
                                                         </a>
                                                      </span>
                                                   </td> </tr>                                                  
 <?php
}
                                 ?>                                               </tbody>
                                             </table>
                                          </div>
                                       </div>
                                    </div>
                                 </div><!-- /SLIDER -->

                                 <!-- /CONFIGURACION DE NOTICIAS -->
                                 <div class="tab-pane <?php if(isset($_GET['active']) and $_GET['active'] == noticias){echo "active";}?>" id="noticias">
                                    <div class="container">
                                       <div class="row">
                                          <div class="span12 configpublic">
                                             <a href="#" class="shortcut btn btn-info" data-toggle="modal" data-target="#nuevanoticia">
                                                <i class="shortcut-icon icon-search"></i> 
                                                <span class="shortcut-label">Nueva Noticia</span>
                                             </a>
                                             <br>

                                             <!-- ============== MODAL NUEVA NOTICIA ============== -->
                                             <div class="modal fade" id="nuevanoticia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                   <div class="modal-content">
                                                      <div class="modal-header">
                                                         <a class="close" data-dismiss="modal" aria-label="Close"><i class=" icon-remove"></i></a>
                                                         <h4 class="modal-title" id="myModalLabel">Agregar nueva noticia</h4>
                                                      </div>
                                                      <form enctype="multipart/form-data" action="../Noticia/agregar_noticia.php" method="post" class="form-horizontal valialum" >
                                                         <div class="modal-body">
                                                            <div class="control-group">											
                                                               <label class="control-label" for="titulo">Titulo</label>
                                                               <div class="controls">  
                                                                  <input type='text' class='span3 disabled form-control' name='titulo' id='titulo' data-validate='validate(required, rangelength(1,25))'>
                                                               </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                               <label class="control-label" for="autor">Autor</label>
                                                               <div class="controls">  
                                                                  <input type='text' class='span3 disabled form-control' name='autor' id='autor' data-validate='validate(required, rangelength(1,25))'>
                                                               </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                               <label class="control-label" for="nombre">Imagen</label>
                                                               <div class="controls"> 
                                                                 <p class="help-block">La imagen debe medir 484x252px</p> 
                                                                  <input type='file' class='span3 disabled form-control' name='imagen' id='imagen' data-validate='validate(required, rangelength(1,25))'>
                                                               </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                               <label class="control-label" for="descripcion">Descripción</label>
                                                               <div class="controls">
                                                                 <p class="help-block">La descripción no puede ser mayor a 1500 caracteres</p>  
                                                                  <textarea name="descripcion" id="descripcion" cols="60" rows="10"></textarea>
                                                               </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->  
                                                         </div>
                                                         <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                                         </div>
                                                      </form>
                                                   </div>
                                                </div>
                                             </div>
                                             <!-- ============== TABLA DE SLIDERS ============== -->
                                             <table class="table table-striped table-bordered get_table table_configpublic"  id="">
                                                <thead>
                                                   <tr>
                                                      <th> Titulo</th>
                                                      <th> Autor </th>
                                                      <th> Fecha </th>
                                                      <th class="td-actions">Accion </th>
                                                   </tr>
                                                </thead>
                                                <tbody><?php
while ($row1 = $datos1->fetchObject()){
                                 ?>
                                                   <tr>
                                                   <td><?php echo $row1->titulo;?></td>
                                                   <td><?php echo $row1->autor;?></td>
                                                   <td><?php echo $row1->fecha;?></td>
                                                   <td>
                                                      <span id="tooltip-ver" class="input-group-addon mitooltip" title="Eliminar Noticia" data-placement="top">
                                                         <a class="btn btn-bigger btn-invert" href="../Noticia/del_noticia.php?idnoticia=<?php echo $row1->idnoticia;?>&urlimagen=<?php echo $row1->urlimagen;?>">
                                                            <i class="btn-icon-only icon-trash"> </i>
                                                         </a>
                                                      </span>
                                                   </td> 
                                                   </tr>
                                                   <?php
}
                                 ?>                                                  
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                    </div>
                                 </div><!-- /NOTICIAS -->
                              </div> <!-- /tab-content -->
                           </div> <!-- /tabbable -->
                        </div> <!-- /widget-content -->
                     </div> <!-- /widget -->
                  </div> <!-- /span8 -->
               </div> <!-- /row -->
            </div> <!-- /container -->
         </div> <!-- /main-inner -->
      </div> <!-- /main -->


      <!-- ==================================================
ANTE FOOTER 
=================================================== -->

      <div class="extra">
         <div class="extra-inner">
            <div class="container">
               <div class="row">
                  <div class="span3">
                     <h4>
                        Teresa Martin</h4>
                     <ul>
                        <li><a href="alumnos.php">Alumnos</a></li>
                        <li><a href="#">Pagos</a></li>
                        <li><a href="#">Reportes</a></li>
                        <li><a href="#">Becas</a></li>
                        <li><a href="#">Ciclo</a></li>
                     </ul>
                  </div>
                  <!-- /span3 -->
                  <div class="span6">
                     <h4>
                        Somos</h4>
                     <p>
                        Somos una institución.... 
                     </p>
                  </div>
                  <!-- /span6 -->
                  <div class="span3">
                     <h4>
                        Contacto</h4>
                     <ul>
                        <li><i class="icon-map-marker"></i><span> 1 de Mayo #123</span></li>
                        <li><i class="icon-phone"></i><span> Telefono</span></li>
                        <li><i class="icon-envelope"></i><span> contacto@teresamartin.com</span></li>
                        <li><i class="fa icon-twitter"></i>&nbsp;<i class="fa icon-facebook"></i>&nbsp;<i class="fa icon-youtube"></i>&nbsp;<span> /teresamartin</span></li>
                     </ul>
                  </div>
                  <!-- /span3 -->
               </div>
               <!-- /row --> 
            </div>
            <!-- /container --> 
         </div>
         <!-- /extra-inner --> 
      </div>
      <!-- /extra -->

      <!-- ==================================================
FOOTER 
=================================================== -->
      <div class="footer">
         <div class="footer-inner">
            <div class="container">
               <div class="row">
                  <div class="span12"> &copy; 2015 <a href="#">Colegio Teresa Martin</a>. </div>
                  <!-- /span12 --> 
               </div>
               <!-- /row --> 
            </div>
            <!-- /container --> 
         </div>
         <!-- /footer-inner --> 
      </div>
      <!-- /footer --> 


      <!-- Le javascript
================================================== --> 
      <!-- Placed at the end of the document so the pages load faster --> 
      <script src="../../assets/js/jquery-1.7.2.min.js"></script> 
      <!--script src="js/excanvas.min.js"></script> 
<script src="js/chart.min.js" type="text/javascript"></script--> 
      <script src="../../assets/js/bootstrap.js"></script>
      <!--script src="js/base.js"></script-->

      <script>$('.mitooltip').tooltip();</script>

   </body>
</html>