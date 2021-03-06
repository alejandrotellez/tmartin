<?php

//  -------- Inicio de sesión --------
session_start();
if(!isset($_SESSION['login'])){
   header("Location: ../Administrador/login.php");
}

$root = "Root";
if($_SESSION['privilegios'] != $root){ 
   header("Location: ../index.php"); 
}

//  -------- Get administradores --------
include_once '../Clases/Beca.php';
$beca = new Beca();
$datos = $beca->get_beca(null, null);

//var_dump ($datos);


?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <title>TERESA MARTIN</title>

      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <meta name="apple-mobile-web-app-capable" content="yes">

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
               <a class="brand" href="../index.php">TERESA MARTIN </a>
               <div class="nav-collapse">
                  <ul class="nav pull-right">
                    <li>
                        <a href="../../index.php" ><i class="icon-home"></i>&nbsp;Página Publicitaria<b class="caret"></b></a>
                     </li>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i>&nbsp;<?php echo $_SESSION['nombre']?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                           <li><a href="javascript:;"><i class="icon-cog"></i><span>   Configuración </span></a></li>
                           <li><a href="../Administrador/login.php"><i class="icon-off"></i><span>   Cerrar Sesion </span></a></li>
                           
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
                  <li class="active"><a href="becas.php"><i class=" icon-bookmark"></i><span>Becas</span> </a> </li>
                  <li><a href="../Ciclo/ciclos.php"><i class=" icon-refresh"></i><span>Ciclos</span> </a> </li>
                  <?php
   $root = "Root";
   if($_SESSION['privilegios']== $root){?>
      <li><a href="../Administrador/administradores.php"><i class=" icon-user"></i><span>Administradores</span> </a> </li>
  <?php }
                  ?> 
                  <li><a href="../Configuracion/configpublic.php"><i class="icon-cog"></i><span>Pagina Publicitaria</span> </a> </li>
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

                  <!-- ============== ACCIONES ============== -->                
                  <div class="span12">
                     <div class="widget">
                        <div class="widget-header"> <i class="icon-bookmark"></i>
                           <h3>Becas</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                           <div class="shortcuts"> 
                              <a href="frm_beca.php" class="shortcut">
                                 <i class="shortcut-icon icon-plus"></i><span class="shortcut-label">Nuevo Beca</span> </a>
                              <a href="javascript:;" class="shortcut" data-toggle="modal" data-target="#beca_editar">
                                 <i class="shortcut-icon icon-pencil"></i><span class="shortcut-label">Editar Beca</span> </a>
                              <a href="javascript:;" class="shortcut" data-toggle="modal" data-target="#beca_eliminar">
                                 <i class="shortcut-icon icon-trash"></i> <span class="shortcut-label">Eliminar Beca</span></a>
                              <!--a href="javascript:;" class="shortcut">
                                 <i class="shortcut-icon icon-search"></i> <span class="shortcut-label">Asignar Beca</span></a-->                              </div>
                           <!-- /shortcuts --> 
                        </div>
                        <!-- /widget-content --> 
                     </div>
                     <!-- /span12 --> 
                  </div>
                  
                  <!-- ============== MODAL EDITAR ADMINISTRADORES ============== -->
                  <div class="modal fade" id="beca_editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <a class="close" data-dismiss="modal" aria-label="Close"><i class=" icon-remove"></i></a>
                              <h4 class="modal-title" id="myModalLabel">Editar Beca</h4>
                           </div>
                           <form action="frm_beca.php" method="get" >
                           <div class="modal-body">                             
                                <label>Inserte el Nombre de la Beca</label>
                                <input type="text" name="nombre">  
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                              <button type="submit" class="btn btn-primary">Editar</button>
                           </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  
                  <!-- ============== MODAL ELIMINAR BECA ============== -->
                  <div class="modal fade" id="beca_eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <a class="close" data-dismiss="modal" aria-label="Close"><i class=" icon-remove"></i></a>
                              <h4 class="modal-title" id="myModalLabel">Eliminar Beca</h4>
                           </div>
                           <form action="del_beca.php" method="get" >
                           <div class="modal-body">                             
                                <label>Inserte el nombre de la Beca</label>
                                <input type="text" name="nombre">  
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                              <button type="submit" class="btn btn-primary">Editar</button>
                           </div>
                           </form>
                        </div>
                     </div>
                  </div>

<!-- ============== TABLA DE ALUMNOS ============== -->    
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
if($row = false){?>
                     <div id="eliminar" class="alert alert-danger alert-dismissible" role="alert">
                        <a href="#" type="button" class="close" data-dismiss="alert" aria-label="Close"><i class=" icon-remove"></i></a>
                        No existen becas establecidas
                     </div>
                     <?php
                               }

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
                                          <span id="tooltip-ver" class="input-group-addon mitooltip" title="Editar datos del Beca" data-placement="top">
                                       <a href="frm_beca.php?idBeca=<?php echo $row->idbeca;?>" class="btn btn-small btn-invert" title="Editar">
                                          <i class="btn-icon-only icon-pencil"> </i></a></span>
                                          <!-- Eliminar Becas -->
                                          <span id="tooltip-ver" class="input-group-addon mitooltip" title="Eliminar datos del Alumno" data-placement="top">
                                       <a href="del_beca.php?idBeca=<?php echo $row->idbeca;?>" class="btn btn-small btn-invert" title="Eliminar">
                                          <i class="btn-icon-only icon-trash"> </i></a></span>
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
                        <li><a href="../index.php"> Inicio </a></li>
                        <li><a href="../Alumno/alumnos.php"> Alumnos </a></li>
                        <li><a href="../Pago/pagos.php"> Pagos </a></li>
                        <li><a href="../Reportes/reportes.php"> Reportes </a></li>
                        <li><a href="becas.php"> Becas </a></li>
                        <li><a href="../Ciclo/ciclos.php"> Ciclos </a></li>
                        <li><a href="../Administrador/administradores.php"> Administradores</a></li>
                        <li><a href="../Configuracion/configpublic.php"> Pagina Publicitaria</a></li>
                     </ul>
                  </div>
                  <!-- /span3 -->
                  <div class="span6">
                     <h4>
                        Misión</h4>
                     <p>
                        Educar a niñez, adolescencia y juventud en el dinamismo de la ciencia y valores de vida, el cultivo de su interioridad que fortalece el espíritu y dispone para el compromiso y responsabilidad consigo mismos, la familia, la saciedad y la patria.
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
                        <li><i class=" icon-twitter"></i>&nbsp;<i class="icon-facebook"></i>&nbsp;<i class="icon-youtube"></i>&nbsp;<span> /teresamartin</span></li>
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
      <script src="../../assets/js/bootstrap.js"></script>
      
<script>$('.mitooltip').tooltip();</script>
      

   </body>
</html>

