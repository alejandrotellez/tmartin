<?php

// NOTA: SE ELIMINO EL COLLAPSE PORQUE NO FUNCIONABA

//  -------- Inicio de sesión --------
session_start();
if(!isset($_SESSION['login'])){
   header("Location: login.php");
}

$root = "Root";
if($_SESSION['privilegios'] != $root){ 
   header("Location: ../index.php"); 
}


//  -------- Get administradores --------
include_once '../Clases/Administrador.php';
$admin = new Administrador();
$datos = $admin->get_administrador(null);

include_once '../Clases/Privilegios.php';
$privilegios = new Privilegios();
$datos2 = $privilegios->get_privilegios();

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
      <link type="text/css" rel="stylesheet" href="../../assets/css/bootstrap.min.css">
      <link type="text/css" rel="stylesheet" href="../../assets/css/bootstrap-responsive.min.css">
      <!-- CSS DE PLANTILLA -->
      <link type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600">
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
                  <li><a href="../index.phpi"><i class="icon-home"></i><span>Inicio</span> </a> </li>
                  <li><a href="../Alumno/alumnos.php"><i class=" icon-user"></i><span>Alumnos</span> </a> </li>
                  <li><a href="../Pago/pagos.php"><i class=" icon-money"></i><span>Pagos</span> </a> </li>
                  <li><a href="../Reportes/reportes.php"><i class="icon-list-alt"></i><span>Reportes</span> </a> </li>
                  <li><a href="../Beca/becas.php"><i class=" icon-bookmark"></i><span>Becas</span> </a> </li>
                  <li><a href="../Ciclo/ciclos.php"><i class=" icon-refresh"></i><span>Ciclos</span> </a> </li>
                  <li class="active"><a href="administradores.php"><i class=" icon-user"></i><span>Administradores</span>
                     </a> </li>
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
                           <h3>Administradores</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                           <div class="shortcuts"> 
                              <a href="frm_administrador.php" class="shortcut">
                                 <i class="shortcut-icon icon-plus"></i><span class="shortcut-label">Nuevo Administrador</span> </a>
                              <a href="javascript:;" class="shortcut" data-toggle="modal" data-target="#matricula_editar">
                                 <i class="shortcut-icon icon-pencil"></i><span class="shortcut-label">Editar Administrador</span> </a>
                              <a href="javascript:;" class="shortcut" data-toggle="modal" data-target="#matricula_eliminar">
                                 <i class="shortcut-icon icon-trash" ></i> <span class="shortcut-label">Eliminar Administrador</span></a>
                              <a href="javascript:;" class="shortcut" data-toggle="modal" data-target="#matricula_ver">
                                 <i class="shortcut-icon icon-search"></i> <span class="shortcut-label">Buscar Administrador</span></a>
                           </div>
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
                              <h4 class="modal-title" id="myModalLabel">Editar Administrador</h4>
                           </div>
                           <form action="frm_administrador.php" method="get" >
                              <div class="modal-body">                             
                                 <label>Inserte la matricula del Administrador</label>
                                 <input type="text" name="idadministrador">  
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
                              <h4 class="modal-title" id="myModalLabel">Eliminar Administrador</h4>
                           </div>
                           <form action="del_administradro.php" method="get" >
                              <div class="modal-body">                             
                                 <label>Inserte la matricula del Administrador</label>
                                 <input type="text" name="idadministrador">  
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
                              <h4 class="modal-title" id="myModalLabel">Buscar Administrador</h4>
                           </div>
                           <form action="frm_administrador.php" method="get" >
                              <div class="modal-body">                             
                                 <label>Inserte la matricula del Administrador</label>
                                 <input type="text" name="idadministrador">
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

                  <!-- ============== TABLA DE ADMINISTRADORES ============== -->               
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
                        <div class="widget-header"> 
                           <!--a  role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"-->
                           <i class="icon-th-list"></i><h3>Lista de Administradores <span class="label label-default">Lista despegable</span></h3>
                           <!--/a-->


                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                           <!--div class="collapse" id="collapseExample"-->
                           <div class="well">

                              <table class="table table-striped table-bordered get_table"  id="">
                                 <thead>
                                    <tr>
                                       <th> Matricula </th>
                                       <th> Nombre </th>
                                       <th> Password </th>
                                       <th> Privilegios </th>
                                       <th class="td-actions">Acciones </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
if($row = false){?>
                                    <div id="eliminar" class="alert alert-danger alert-dismissible" role="alert">
                                       <a href="#" type="button" class="close" data-dismiss="alert" aria-label="Close"><i class=" icon-remove"></i></a>
                                       No existen Administradores Almacenados
                                    </div>
                                    <?php
}

while ($row = $datos->fetchObject()){
                                    ?>
                                    <tr>
                                       <td><?php echo $row->idadministrador;?></td>
                                       <td><?php echo $row->nombre," ", $row->a_paterno," ", $row->a_materno;?></td>
                                       <td><?php echo $row->password;?></td>
                                       <td><?php 
   /*while ($row2 = $datos2->fetchObject()){
      if($row->idprivilegios == $row2->idprivilegios){
         echo $row->idprivilegios.$row2->privilegios;
      }
   }*/
   if($row->idprivilegios == 1){echo "Root";}
   if($row->idprivilegios == 2){echo "Administrador";}
   if($row->idprivilegios == 3){echo "Actualizar";}
   if($row->idprivilegios == 4){echo "Eliminar";}
                                          ?></td>
                                       <td class="td-actions">
                                          <!-- Ver mas -->
                                          <span id="tooltip-ver" class="input-group-addon mitooltip" title="Ver más datos del Administrador" data-placement="top">
                                             <a class="btn btn-small btn-invert" href="frm_administrador.php?idadministrador=<?php echo $row->idadministrador;?>&ver=ver" title="Ver mas"><i class="btn-icon-only icon-zoom-in"> </i></a></span>      
                                          <!-- Editar -->
                                          <span id="tooltip-ver" class="input-group-addon mitooltip" title="Editar datos del Administrador" data-placement="top">
                                             <a class="btn btn-small btn-invert" href="frm_administrador.php?idadministrador=<?php echo $row->idadministrador;?>" title="Editar"><i class="btn-icon-only icon-pencil"> </i></a></span>
                                          <!-- Eliminar -->
                                          <?php
   if($row->idprivilegios != 1){ ?>
                                          <span id="tooltip-ver" class="input-group-addon mitooltip" title="Eliminar Administrador" data-placement="top">
                                             <a class="btn btn-small btn-invert" href="del_administradro.php?idadministrador=<?php echo $row->idadministrador;?>" title="eliminar"><i class="btn-icon-only icon-trash"> </i></a></span>
                                          <?php
                               }
                                          ?>

                                    </tr>
                                    <?php
}
                                    ?>



                                 </tbody>
                              </table>

                           </div><!-- / well-->
                           <!--/div--><!-- / collapse-->
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
                        <li><a href="../Alumno/alumnos.php"> Alumnos </a></li>
                        <li><a href="../Pago/pagos.php"> Pagos </a></li>
                        <li><a href="../Reportes/reportes.php"> Reportes </a></li>
                        <li><a href="../Beca/becas.php"> Becas </a></li>
                        <li><a href="../Ciclo/ciclos.php"> Ciclos </a></li>
                        <li><a href="administradores.php"> Administradores</a></li>
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
      <!--script src="js/excanvas.min.js"></script> 
<script src="js/chart.min.js" type="text/javascript"></script--> 
      <script src="../../assets/js/bootstrap.js"></script>
      <!--script src="js/base.js"></script-->

      <script>$('.mitooltip').tooltip();</script>

   </body>
</html>