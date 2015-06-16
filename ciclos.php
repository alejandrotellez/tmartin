<?php

   //  -------- Inicio de sesión --------
   session_start();
   if(!isset($_SESSION['login'])){
      header("Location: login.php");
   }
   
?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <title>TERESA MARTIN</title>

      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <meta name="apple-mobile-web-app-capable" content="yes">

      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
      <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
      <link href="css/font-awesome.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href="css/pages/dashboard.css" rel="stylesheet">
      
      
      <!---------- Style de AAA y Asociados ---------->
      <link href="css/styleAAA.css" rel="stylesheet">

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
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> Nombre del Administrador <b class="caret"></b></a>
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
                  <li><a href="index.php"><i class="icon-home"></i><span>Inicio</span> </a> </li>
                  <li><a href="alumnos.php"><i class=" icon-user"></i><span>Alumnos</span> </a> </li>
                  <li><a href="pagos.php"><i class=" icon-money"></i><span>Pagos</span> </a> </li>
                  <li><a href="reportes.php"><i class="icon-list-alt"></i><span>Reportes</span> </a> </li>
                  <li><a href="becas.php"><i class=" icon-bookmark"></i><span>Becas</span> </a> </li>
                  <li class="active"><a href="ciclos.php"><i class=" icon-refresh"></i><span>Ciclos</span> </a> </li>
                  <li><a href="administradores.php"><i class=" icon-user"></i><span>Administradores</span> </a> </li>
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

                  <!-- ============== FORMULARIO DE NUEVO ADMINISTRADOR ============== -->                
                  <div class="span12"> 
                     <div class="widget ">
                        <div class="widget-header">
                           <i class="icon-user"></i>
                           <h3>Nuevo Ciclo Escolar</h3>
                           <a href="index.php" class="cerrar_frm"><i class=" icon-remove"></i></a>
                        </div> <!-- /widget-header -->					
                        <div class="widget-content">

                           <div class="content">
                              <div class="pane" id="formcontrols">
                                 <form id="edit-profile" class="form-horizontal" action="agregar_ciclo.php" method="post">
                                    <fieldset>                          
                                       <h6 class="bigstats">Agregar un nuevo ciclo escolar</h6>
                                       <div id="big_stats" class="cf">
                                          <div class="control-group">											
                                             <label class="control-label" for="ciclo">Ciclo</label>
                                             <div class="controls">
                                                <input type="text" class="span6 disabled" name="ciclo" id="ciclo" value="Agosto-Junio" >
                                                <p class="help-block">El ciclo por defaul es Agosto-Junio</p>
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="year">Año</label>
                                             <div class="controls">
                                                <input type="number" class="span6" id="year" name="year" value="<?php echo date('Y'); ?>">
                                                <p class="help-block">El año por defaul es el año actual</p>
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->                
                                          <div class="control-group">											
                                             <label class="control-label" for="radiobtns">Grado</label>
                                             <div class="controls">
                                                <select class="form-control" name="grado">
                                                   <option value="1" >1</option>
                                                   <option value="2" >2</option>
                                                   <option value="3" >3</option>
                                                   <option value="4" >4</option>
                                                   <option value="5" >5</option>
                                                   <option value="6" >6</option>
                                                   </select>
                                             </div>	<!-- /controls -->			
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="radiobtns">Grupo</label>
                                             <div class="controls">
                                                <select class="form-control" name="grupo">
                                                   <option value="a" >A</option>
                                                   <option value="b" >B</option>
                                                   <option value="c" >C</option>                                                   
                                                   </select>
                                             </div>	<!-- /controls -->			
                                          </div> <!-- /control-group -->
                                       <div class="form-actions">
                                          <button type="submit" class="btn btn-primary">Guardar</button> 
                                          <button class="btn">Cancelar</button>
                                       </div> <!-- /form-actions -->
                                       </div> <!-- /big_stats -->
                                    </fieldset>
                                 </form>
                                 
                              </div>								
                           </div>

                        </div> <!-- /widget-content -->
                     </div> <!-- /widget -->
                  </div> <!-- /span12 -->
                  
                  
                  <!-- ============== TABLA DE ADMINISTRADORES ============== -->               
                  
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
      <script src="js/jquery-1.7.2.min.js"></script> 
      <!--script src="js/excanvas.min.js"></script> 
<script src="js/chart.min.js" type="text/javascript"></script--> 
      <script src="js/bootstrap.js"></script>
      <!--script src="js/base.js"></script-->

      

   </body>
</html>