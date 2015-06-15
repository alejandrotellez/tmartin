<?php

   //  -------- Inicio de sesión --------
   session_start();
   if(!isset($_SESSION['login'])){
      header("Location: login.php");
   }

   //  -------- DATOS PARA UPDATE --------
   if(isset($_GET['idadministrador'])){
        $idAdministrador = $_GET['idadministrador'];
        include_once 'Administrador.php';
        $admin = new Administrador();
        $datos = $admin->get_administrador($idAdministrador);
        $row = $datos->fetchObject();
      }
   
   if(isset($_GET['ver'])){
        $ver = $_GET['ver'];
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
                  <li class="active"><a href="index.php"><i class="icon-home"></i><span>Inicio</span> </a> </li>
                  <li><a href="alumnos.php"><i class=" icon-user"></i><span>Alumnos</span> </a> </li>
                  <li><a href="pagos.php"><i class=" icon-money"></i><span>Pagos</span> </a> </li>
                  <li><a href="reportes.php"><i class="icon-list-alt"></i><span>Reportes</span> </a> </li>
                  <li><a href="becas.php"><i class=" icon-bookmark"></i><span>Becas</span> </a> </li>
                  <li><a href="ciclos.php"><i class=" icon-refresh"></i><span>Ciclos</span> </a> </li>
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
                           <h3>Nuevo Administrador</h3>
                           <a href="administradores.php" class="cerrar_frm"><i class=" icon-remove"></i></a>
                        </div> <!-- /widget-header -->					
                        <div class="widget-content">

                           <div class="content">
                              <div class="pane" id="formcontrols">
                                 <form id="edit-profile" class="form-horizontal" action="<?php 
if(isset($ver)){echo "frm_administrador.php";}else{echo "agregar_admin.php";}
                                    ?>" method="<?php 
if(isset($ver)){echo "get";}else{echo "post";}
                                    ?>">
                                    <fieldset>                          
                                       <h6 class="bigstats">Información Personal del Administrador</h6>
                                       <div id="big_stats" class="cf">
                                          <?php if(isset($idAdministrador)){
                echo '<input type="hidden" name="idAdministrador" value="'.$row->idadministrador.'">';}
if(isset($ver)){
                echo '<input type="hidden" name="idadministrador" value="'.$row->idadministrador.'">';}
                                          ?>         
                                          <div class="control-group">											
                                             <label class="control-label" for="nombre">Nombre</label>
                                             <div class="controls">
                                                <input type="text" class="span6 disabled" name="nombre" id="nombre" <?php if(isset($idAdministrador)){
           echo 'value="'.$row->nombre.'"';}
if(isset($ver)){echo "disabled='disabled'";}?>>
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="a_paterno">Apellido Paterno</label>
                                             <div class="controls">
                                                <input type="text" class="span6" id="a_paterno" name="a_paterno" <?php if(isset($idAdministrador)){
           echo 'value="'.$row->a_paterno.'"';}
if(isset($ver)){echo "disabled='disabled'";}?>>
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="a_materno">Apellido Materno</label>
                                             <div class="controls">
                                                <input type="text" class="span6" id="a_materno" name="a_materno" <?php if(isset($idAdministrador)){
           echo 'value="'.$row->a_materno.'"';}
if(isset($ver)){echo "disabled='disabled'";}?>>
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="password">Password</label>
                                             <div class="controls">
                                                <input type="password" class="span6" id="password" name="password" <?php if(isset($idAdministrador)){
           echo 'value="'.$row->password.'"';}
if(isset($ver)){echo "disabled='disabled'";}?>>
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->                                
                                          <div class="control-group">											
                                             <label class="control-label" for="radiobtns">Privilegios</label>
                                             <div class="controls">
                                                <select class="form-control" name="idPrivilegios" <?php
if(isset($ver)){echo "disabled='disabled'";}?>>
                                                   <option value="1" <?php if(isset($idAdministrador)){
      if($row->idprivilegios == 1){
         echo "selected";
      }
          }?>>1</option>
                                                   <option value="2" <?php if(isset($idAdministrador)){
      if($row->idprivilegios == 2){
         echo "selected";
      }
          }?>>2</option>
                                                   <option value="3" <?php if(isset($idAdministrador)){
      if($row->idprivilegios == 3){
         echo "selected";
      }
          }?>>3</option>
                                                   </select>
                                             </div>	<!-- /controls -->			
                                          </div> <!-- /control-group -->
                                       <div class="form-actions">
                                          <button type="submit" class="btn btn-primary">
                                          <?php 
if(isset($ver)){
   echo "Editar";}else{
   if(isset($idAdministrador)){
                    echo "Actualizar";
                }  else {
                    echo "Guardar";
                }
}

                                             ?>
                                         </button> 
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