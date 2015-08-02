<?php

//  -------- Inicio de sesión --------
session_start();
if(!isset($_SESSION['login'])){
   header("Location: login.php");
}

//  -------- Get administradores --------

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
      <link type="text/css" rel="stylesheet" href="../../assets/css/bootstrap.min.css" >
      <link type="text/css" rel="stylesheet" href="../../assets/css/bootstrap-responsive.min.css">
      <!-- CSS DE PLANTILLA -->
      <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600">
      <link type="text/css" rel="stylesheet" href="../../assets/css/font-awesome2.css">
      <link type="text/css" rel="stylesheet" href="../../assets/css/style.css">
      <link type="text/css" rel="stylesheet" href="../../assets/css/pages/dashboard.css">
      <!-- CSS DE AAA Y ASOCIADOS -->
      <link type="text/css" rel="stylesheet" href="../../assets/css/styleAAA.css">

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
               <a class="brand" href="index.html">TERESA MARTIN </a>
               <div class="nav-collapse">
                  <ul class="nav pull-right">
                     <li>
                        <a href="../index.php" ><i class="icon-home"></i>&nbsp;Página Publicitaria<b class="caret"></b></a>
                     </li>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i>&nbsp;<?php echo $_SESSION['nombre']?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                           <li><a href="javascript:;"><i class="icon-cog"></i><span>   Configuración </span></a></li>
                           <li><a href="login.html"><i class="icon-off"></i><span>   Cerrar Sesion </span></a></li>
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
                  <li><a href="index.php"><i class="icon-home"></i><span>Inicio</span> </a> </li>
                  <li><a href="alumnos.php"><i class=" icon-user"></i><span>Alumnos</span> </a> </li>
                  <li class="active"><a href="pagos.php"><i class=" icon-money"></i><span>Pagos</span> </a> </li>
                  <li><a href="reportes.php"><i class="icon-list-alt"></i><span>Reportes</span> </a> </li>
                  <li><a href="becas.php"><i class=" icon-bookmark"></i><span>Becas</span> </a> </li>
                  <li><a href="ciclos.php"><i class=" icon-refresh"></i><span>Ciclos</span> </a> </li>
                  <?php
   $root = "Root";
if($_SESSION['privilegios']== $root){?>
                  <li><a href="../Administrador/administradores.php"><i class=" icon-user"></i><span>Administradores</span> </a> </li>
                  <?php }
                  ?> 
                  <li><a href="configpublic.php"><i class="icon-cog"></i><span>Pagina Publicitaria</span> </a> </li>
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
                  <!-- ============== TABLA DE RECIBO ============== -->    
                  <div class="span12">
                     <!-- /widget -->                     
                     <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-th-list"></i>
                           <h3>Lista de Becas</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">



                           <table class="table table-striped table-bordered get_table">
                              <thead>
                                 <tr>
                                    <th> Nombre </th>
                                    <th> Descuento </th>
                                    <th class="td-actions"> Acciones </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
while ($row = $datos->fetchObject()){
                                 ?>
                                 <tr>                                    
                                    <td><?php echo $row->nombre;?></td>
                                    <td>% <?php $descuento= $row->descuento*100; echo $descuento;?></td>
                                    <td class="td-actions">
                                       <!-- Asignar becas -->
                                       <!--a href="javascript:;" class="btn btn-small btn-invert" title="Asignar">
<i class="btn-icon-only icon-zoom-in"> </i></a-->
                                       <!-- Editar Becas -->
                                       <a href="frm_beca.php?idBeca=<?php echo $row->idbeca;?>" class="btn btn-small btn-invert" title="Editar">
                                          <i class="btn-icon-only icon-pencil"> </i></a>
                                       <!-- Eliminar Becas -->
                                       <a href="del_beca.php?idBeca=<?php echo $row->idbeca;?>" class="btn btn-small btn-invert" title="Eliminar">
                                          <i class="btn-icon-only icon-trash"> </i></a>
                                    </td>
                                 </tr>
                                 <?php
}
                                 ?>
                              </tbody>
                           </table>
                        </div>
                        <!-- /widget-content --> 
                     </div>
                     <!-- /widget --> 
                  </div>
                  <!-- /span12 -->

               </div>
               <!-- /row --> 
            </div>
            <!-- /container --> 
         </div>
         <!-- /main-inner --> 
      </div>
      <!-- /main -->

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
                        <li><a href="alumnos.html">Alumnos</a></li>
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

   </body>
</html>

