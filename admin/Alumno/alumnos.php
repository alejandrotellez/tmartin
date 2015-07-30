<?php

//  -------- Inicio de sesión --------
session_start();
if(!isset($_SESSION['login'])){
   header("Location: login.php");
}

//  -------- Get administradores --------
include_once '../Clases/Alumno.php';
$alumno = new Alumno();

include_once '../Clases/Estatus.php';
$estatus = new Estatus();
$datos_estatus = $estatus->get_estatus(null, null);
$idestatus = null;

if(isset($_GET['estatus'])){
   $idestatus = $_GET['estatus'];
}

$datos = $alumno->get_alumno(null, $idestatus);

//var_dump ($datos);


?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <title>TERESA MARTIN</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <link rel="shortcut icon" href="../assets/img/ico/favicon.png">

      <!-- CSS DE BOOTSTRAP -->
      <link type="text/css" rel="stylesheet" href="../../assets/css/bootstrap.min.css">
      <link type="text/css" rel="stylesheet" href="../../assets/css/bootstrap-responsive.min.css">
      <!-- CSS DE PLANTILLA -->
      <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600">
      <link type="text/css" rel="stylesheet" href="../../assets/css/font-awesome2.css">
      <link type="text/css" rel="stylesheet" href="../../assets/css/style.css">
      <link type="text/css" rel="stylesheet" href="../../assets/css/pages/dashboard.css">
      <!-- CSS DE AAA Y ASOCIADOS-->
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
                  <li class="active"><a href="alumnos.php"><i class=" icon-user"></i><span>Alumnos</span> </a> </li>
                  <li><a href="../Pago/pagos.php"><i class=" icon-money"></i><span>Pagos</span> </a> </li>
                  <li><a href="../Reportes/reportes.php"><i class="icon-list-alt"></i><span>Reportes</span> </a> </li>
                  <li><a href="../Beca/becas.php"><i class=" icon-bookmark"></i><span>Becas</span> </a> </li>
                  <li><a href="../Ciclo/ciclos.php"><i class=" icon-refresh"></i><span>Ciclos</span> </a> </li>
                  <li><a href="../Administrador/administradores.php"><i class=" icon-user"></i><span>Administradores</span> </a> </li>
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
                        <div class="widget-header"> <i class="icon-user"></i>
                           <h3>Alumno</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                           <div class="shortcuts"> 
                              <a href="frm_alumno.php" class="shortcut">
                                 <i class="shortcut-icon icon-plus"></i><span class="shortcut-label">Nuevo Alumno</span> </a>
                              <a href="javascript:;" class="shortcut" data-toggle="modal" data-target="#matricula_editar">
                                 <i class="shortcut-icon icon-pencil"></i><span class="shortcut-label">Editar Alumno</span> </a>
                              <a href="javascript:;" class="shortcut"data-toggle="modal" data-target="#matricula_eliminar">
                                 <i class="shortcut-icon icon-trash"></i> <span class="shortcut-label">Eliminar Alumno</span></a>
                              <a href="javascript:;" class="shortcut"data-toggle="modal" data-target="#matricula_ver">
                                 <i class="shortcut-icon icon-search"></i> <span class="shortcut-label">Buscar Alumno</span></a>                              </div>
                           <!-- /shortcuts --> 
                        </div>
                        <!-- /widget-content --> 
                     </div>
                     <!-- /span12 --> 
                  </div>
                  <!-- ============== MODAL EDITAR ADMINISTRADORES ============== -->
                  <div class="modal fade" id="matricula_editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <a class="close" data-dismiss="modal" aria-label="Close"><i class=" icon-remove"></i></a>
                              <h4 class="modal-title" id="myModalLabel">Editar Alumno</h4>
                           </div>
                           <form action="frm_alumno.php" method="get" >
                              <div class="modal-body">                             
                                 <label>Inserte la matricula del Alumno</label>
                                 <input type="text" name="matricula">  
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                 <button type="submit" class="btn btn-primary">Editar</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>


                  <!-- ============== MODAL ELIMINAR ADMINISTRADORES ============== -->
                  <div class="modal fade" id="matricula_eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <a class="close" data-dismiss="modal" aria-label="Close"><i class=" icon-remove"></i></a>
                              <h4 class="modal-title" id="myModalLabel">Eliminar Alumno</h4>
                           </div>
                           <form action="del_alumno.php" method="get" >
                              <div class="modal-body">                             
                                 <label>Inserte la matricula del Alumno</label>
                                 <input type="text" name="matricula">  
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                 <button type="submit" class="btn btn-primary">Eliminar</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>

                  <!-- ============== MODAL VER MAS ADMINISTRADORES ============== -->
                  <div class="modal fade" id="matricula_ver" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <a class="close" data-dismiss="modal" aria-label="Close"><i class=" icon-remove"></i></a>
                              <h4 class="modal-title" id="myModalLabel">Ver más información de Alumno</h4>
                           </div>
                           <form action="frm_alumno.php" method="get" >
                              <div class="modal-body">                             
                                 <label>Inserte la matricula del Alumno</label>
                                 <input type="text" name="matricula">
                                 <input type="hidden" name="ver" value="ver">
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                 <button type="submit" class="btn btn-primary">Buscar</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>


                  <!-- ============== TABLA DE ALUMNOS ============== -->    
                  <div class="span12">

                    <!-- ============== MENSAJES DE AVISO ============== -->
                     <?php 
   if(isset($_GET['option'])){

   if($_GET['option']==1){?>
                     <div id="eliminar" class="alert alert-success alert-dismissible" role="alert">
                        <a href="#" type="button" class="close" data-dismiss="alert" aria-label="Close"><i class=" icon-remove"></i></a>
                        El sistema a eliminado definitivamente al alumno <?php echo $_GET['nombre']?>
                     </div>
                     <?php
                         }
   if($_GET['option']==2){?>
                     <div id="eliminar" class="alert alert-success alert-dismissible" role="alert">
                        <a href="#" type="button" class="close" data-dismiss="alert" aria-label="Close"><i class=" icon-remove"></i></a>
                        El sistema a almacenado la información del alumno <?php echo $_GET['nombre']?>
                     </div>
                     <?php
                         }
   if($_GET['option']==3){?>
                     <div id="eliminar" class="alert alert-success alert-dismissible" role="alert">
                        <a href="#" type="button" class="close" data-dismiss="alert" aria-label="Close"><i class=" icon-remove"></i></a>
                        El sistema a dado de baja al alumno <?php echo $_GET['nombre']?>
                     </div>
                     <?php
                         }
}
                     ?>

                     <!-- /widget -->                     
                     <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-th-list"></i>
                           <h3>Lista de Alumnos
                              <?php
if(isset($_GET['estatus'])){
   while($row_estatus = $datos_estatus->fetchObject()){
      if($row_estatus->idestatus == $_GET['estatus']){
         echo "con estatus $row_estatus->estatus";
      }
   }
}else{
   echo "Inscritos";
}
                              ?></h3>


                           <?php
/*while($row_estatus = $datos_estatus->fetchObject()){
   echo "<a href='alumnos.php?estatus=$row_estatus->idestatus' class='cerrar_frm active'>$row_estatus->estatus  </a>";
}*/
                           ?>  
                           <a href='alumnos.php?estatus=3' class='cerrar_frm active'>Solicitud  </a>
                           <a href='alumnos.php?estatus=2' class='cerrar_frm active'>Eliminados  </a> 
                           <a href='alumnos.php?estatus=1' class='cerrar_frm active'>Inscritos  </a>                       
                           <div class="estatusfrm">
                              <h3 class="estatus_frm">Estatus </h3>
                           </div>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                           <table class="table table-striped table-bordered get_table">
                              <thead>
                                 <tr>
                                    <th> Matricula </th>
                                    <th> Nombre </th>
                                    <th> Ciclo </th>
                                    <th> Grado </th>
                                    <th> Escolaridad </th>
                                    <th> Beca</th>
                                    <th class="td-actions"> Acciones </th>
                                 </tr>
                              </thead>
                              <tbody>

                                 <?php
if($datos == false){
   echo "<div id='error' class='alert alert-danger alert-dismissible' role='alert'>
                        <a href='#' type='button' class='close' data-dismiss='alert' aria-label='Close'><i class=' icon-remove'></i></a>
                        No existen alumnos
                     </div>";
}else{
   while ($row = $datos->fetchObject()){
                                 ?>
                                 <tr>
                                    <td><?php echo $row->matricula;?></td>
                                    <td><?php echo $row->nombre," ", $row->a_paterno," ", $row->a_materno;?></td>
                                    <td><?php echo $row->idgg;?></td>
                                    <td><?php echo $row->idgg;?></td>
                                    <td><?php echo $row->idescolaridad;?></td>
                                    <td><?php echo $row->idbeca;?></td>
                                    <td class="td-actions">
                                       <!------------- VER MAS ------------->
                                       <span id="tooltip-ver" class="input-group-addon mitooltip" title="Ver más datos del Alumno" data-placement="top">
                                          <a href="frm_alumno.php?matricula=<?php echo $row->matricula;?>&ver=ver" class="btn btn-small btn-invert" title="Ver mas">
                                             <i class="btn-icon-only icon-zoom-in"> </i></a></span>
                                       <!------------- EDITAR ------------->
                                       <span id="tooltip-editar" class="input-group-addon mitooltip" title="Editar información del Alumno" data-placement="top">
                                          <a href="frm_alumno.php?matricula=<?php echo $row->matricula;?>" class="btn btn-small btn-invert" title="Editar">
                                             <i class="btn-icon-only icon-pencil"> </i></a></span>
                                       <!------------- DAR DE BAJA / CAMBIAR ESTATUS ------------->
                                       <span id="tooltip-eliminar" class="input-group-addon mitooltip" title="Dar de baja Alumno" data-placement="top">
                                          <a href="baja_alumno.php?matricula=<?php echo $row->matricula;?>" class="btn btn-small btn-invert" title="Eliminar">
                                             <i class="btn-icon-only icon-trash"> </i></a></span>
                                       <!------------- ELIMINAR DEFINITIVAMENTE------------->
                                       <?php
      if($_SESSION['privilegios']=="Root"){
                                       ?>
                                       <span id="tooltip-eliminar" class="input-group-addon mitooltip" title="Eliminar definitiva Alumno" data-placement="top">
                                          <a href="del_alumno.php?matricula=<?php echo $row->matricula;?>" class="btn btn-small btn-invert" title="Eliminar">
                                             <i class="btn-icon-only icon-remove"> </i></a></span>
                                       <?php
      }

                                       ?>

                                    </td>
                                 </tr>
                                 <?php
   }
}
                                 ?>
                              </tbody>
                           </table>

                           <!-- ============== PAGINACION
<div class="row">
<div>
<nav>
<ul class="pagination">
<li><a href="">&laquo;</a></li>
<li><a href="">1</a></li>
<li><a href="">2</a></li>
<li><a href="">3</a></li>
<li><a href="">4</a></li>
<li><a href="">5</a></li>
<li><a href="">&raquo;</a></li>
</ul>
</nav> 
</div>
</div>
============== -->


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
                        <li><a href="alumnos.php"> Alumnos </a></li>
                        <li><a href="../Pago/pagos.php"> Pagos </a></li>
                        <li><a href="../Reportes/reportes.php"> Reportes </a></li>
                        <li><a href="../Beca/becas.php"> Becas </a></li>
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


      <script> 
         $('.mitooltip').tooltip();

      </script>


   </body>
</html>