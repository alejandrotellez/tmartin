<?php

//  -------- Inicio de sesión --------
session_start();
if(!isset($_SESSION['login'])){
   header("Location: login.php");
}

//  -------- DATOS PARA UPDATE --------
if(isset($_GET['idBeca'])){
   $idBeca = $_GET['idBeca'];
   include_once '../Clases/Beca.php';
   $beca = new Beca();
   $datos = $beca->get_beca($idBeca, null);
   $row = $datos->fetchObject();
}

//  -------- DATOS PARA UPDATE --------
if(isset($_GET['nombre'])){
   $idBeca = $_GET['nombre'];
   include_once '../Clases/Beca.php';
   $beca = new Beca();
   $datos = $beca->get_beca(null, $idBeca);
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

      <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="../../assets/css/bootstrap-responsive.min.css" rel="stylesheet">
      <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
      <link href="../../assets/css/font-awesome2.css" rel="stylesheet">
      <link href="../../assets/css/style.css" rel="stylesheet">
      <link href="../../assets/css/pages/dashboard.css" rel="stylesheet">


      <!---------- Style de AAA y Asociados ---------->
      <link href="../../assets/css/styleAAA.css" rel="stylesheet">

      <!-- KETCHUP-->
      <link href="../../assets/css/ketchup/jquery.ketchup.css" rel="stylesheet">
      <link href="../../assets/css/ketchup/jcomfirmaction.css" rel="stylesheet">

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

                  <!-- ============== FORMULARIO DE NUEVO BECA ============== -->                
                  <div class="span12"> 
                     <div class="widget ">
                        <div class="widget-header">
                           <i class="icon-user"></i>
                           <h3>Nuevo Beca</h3>
                           <a href="becas.php" class="cerrar_frm"><i class=" icon-remove"></i></a>
                        </div> <!-- /widget-header -->					
                        <div class="widget-content">

                           <div class="content">
                              <div class="pane" id="formcontrols">
                                 <form id="edit-profile" class="form-horizontal valibeca" action="agregar_beca.php" method="post">
                                    <fieldset>                          
                                       <h6 class="bigstats">Información sobre la Beca</h6>
                                       <div id="big_stats" class="cf">
                                          <?php if(isset($idBeca)){
   echo '<input type="hidden" name="idBeca" value="'.$row->idbeca.'">';}
                                          ?>             
                                          <div class="control-group">											
                                             <label class="control-label" for="nombre">Nombre</label>
                                             <div class="controls">
                                                <input type="text" class="span6 disabled form-control" name="nombre" data-validate="validate(required, rangelength(1,11))" id="nombre" <?php if(isset($idBeca)){
                                             echo "value='".$row->nombre."'";}
                                                       ?>             >
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="descuento">Descuento</label>
                                             <div class="controls">
                                                <span>%</span>
                                                <input type="text" class="span6 form-control" id="descuento" data-validate="validate(required, number)" name="descuento" <?php if(isset($idBeca)){
                                                          $descuento= $row->descuento*100;
                                                          echo "value='".$descuento."'";}
                                                       ?> >
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->
                                          <div class="form-actions">
                                             <button type="submit" class="btn btn-primary"> <?php if(isset($idBeca)){
                                                          echo "Actualizar";}
else{
   echo "Guardar";}
                                                ?> </button> 
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
      <script src="../../assets/js/jquery-1.7.2.min.js"></script> 
      <!--script src="js/excanvas.min.js"></script> 
<script src="js/chart.min.js" type="text/javascript"></script--> 
      <script src="../../assets/js/bootstrap.js"></script>
      <!--script src="js/base.js"></script-->

      <script src="../../assets/js/ketchup/jquery.js"></script>
      <script src="../../assets/js/ketchup/jquery.ketchup.js"></script>
      <script src="../../assets/js/ketchup/jquery.ketchup.validations.js"></script>
      <script src="../../assets/js/ketchup/jquery.ketchup.helpers.js"></script>
      <script src="../../assets/js/ketchup/jconfirmaction.jquery.js"></script>

      <script> 
         $(document).ready(function(){

            $('.valibeca').ketchup();

         });
      </script>

   </body>
</html>