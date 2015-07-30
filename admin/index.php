<?php

//  -------- Inicio de sesión --------
session_start();
if(!isset($_SESSION['login'])){
   header("Location: Administrador/login.php");
}

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
      <link type="text/css" rel="stylesheet" href="../assets/css/bootstrap.min.css">
      <link type="text/css" rel="stylesheet" href="../assets/css/bootstrap-responsive.min.css">
      <!-- CSS DE PLANTILLA -->
      <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600">
      <link type="text/css" rel="stylesheet" href="../assets/css/font-awesome2.css">
      <link type="text/css" rel="stylesheet" href="../assets/css/style.css">
      <link type="text/css" rel="stylesheet" href="../assets/css/pages/dashboard.css">
      <!-- CSS DE AAA Y ASOCIADOS -->
      <link type="text/css" rel="stylesheet" href="../assets/css/styleAAA.css">

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
                           <li><a href="Administrador/login.php"><i class="icon-off"></i><span>   Cerrar Sesion </span></a></li>
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
                  <li><a href="Alumno/alumnos.php"><i class=" icon-user"></i><span>Alumnos</span> </a> </li>
                  <li><a href="Pago/pagos.php"><i class=" icon-money"></i><span>Pagos</span> </a> </li>
                  <li><a href="Reportes/reportes.php"><i class="icon-list-alt"></i><span>Reportes</span> </a> </li>
                  <li><a href="Beca/becas.php"><i class=" icon-bookmark"></i><span>Becas</span> </a> </li>
                  <li><a href="Ciclo/ciclos.php"><i class=" icon-refresh"></i><span>Ciclos</span> </a> </li>
                  <li><a href="Administrador/administradores.php"><i class=" icon-user"></i><span>Administradores</span> </a> </li>
                  <li><a href="Configuracion/configpublic.php"><i class="icon-cog"></i><span>Pagina Publicitaria</span> </a> </li>
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
                     <div class="widget">
                        <div class="widget-hearder">
                           <a data-toggle="collapse" data-parent="#accordion" href="#guia" aria-expanded="true" aria-controls="collapseOne">
                              <div class="page-header">
                                 <h1>Guia Rápida <span><small>Sistema Web Teresa Martin</small></span></h1>
                              </div>
                           </a>
                           <!--   ------------------------- GUIA RAPIDA  ----------------------     -->
                        </div>
                        <div class="widget-content">
                           <div id="guia" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                              <div class="panel-body">
                                 <div class="alert alert-info" role="alert">
                                    <h2> BIENVENIDO a la Guía Rápida de Introducción <span class="label label-primary">aquí están tus datos rectifica que sean los correctos</span></h2>
                                    <br>
                                 </div>

                                 <button type="button" class="btn btn-lg btn-danger center-block" id="btn-info-1" data-toggle="popover" 
                                         title="Tu nombre completo" 
                                         data-content="Tue nombre es : <?php echo $_SESSION['nombre']; echo "<br>";?> Tus Privilegios son: <?php echo $_SESSION['privilegios'];echo "<br>";?> Tu matricula es: <?php echo $_SESSION['idAdministrador'];echo "<br>";?> Tu contraseña es: <?php echo $_SESSION['password'];?>">
                                    Mis datos
                                 </button>

                                 <br>
                                 <br>

                                 <div class="alert alert-info btn-group " role="alert group">

                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-modal-1">Primer paso</button>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-modal-2">Segundo paso</button>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-modal-3">Tercer paso</button>

                                 </div>

                                 <!--   -------------------------modal 1 ----------------------     -->

                                 <div id="paso-1" class="modal fade bs-modal-1"  tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                             <h4 class="modal-title" id="myModalLabel">Primer paso</h4>
                                          </div>
                                          <div class="modal-body">
                                             <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo 
                                                risus, porta ac consectetur ac, vestibulum at eros.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. 
                                                Vivamus sagittis lacus vel augue laoreet rutrum faucibusdolor auctor.Aenean lacinia bibendum nulla sed consectetur. 
                                                Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non 
                                                metus auctor fringilla.</p>
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                             <button type="button" id="guia-1" class="btn btn-primary">Siguiente</button>
                                          </div>
                                       </div>
                                    </div>

                                 </div>

                                 <!--   -------------------------modal 2 ----------------------     -->

                                 <div id="paso-2" class="modal fade bs-modal-2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                             <h4 class="modal-title" id="myModalLabel">Segundo paso</h4>
                                          </div>
                                          <div class="modal-body">
                                             <div class="alert alert-info" role="alert">
                                                <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo 
                                                   risus, porta ac consectetur ac, vestibulum at eros.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. 
                                                   Vivamus sagittis lacus vel augue laoreet rutrum faucibusdolor auctor.Aenean lacinia bibendum nulla sed consectetur. 
                                                   Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non 
                                                   metus auctor fringilla.
                                                </p>
                                             </div>
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button" id="guia-2a" class="btn btn-primary">Anterior</button>
                                             <button type="button" id="guia-2" class="btn btn-primary">Siguiente</button>
                                          </div>
                                       </div>
                                    </div>

                                 </div>

                                 <!--   -------------------------modal 3 ----------------------     -->

                                 <div id="paso-3" class="modal fade bs-modal-3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                             <h4 class="modal-title" id="myModalLabel">Tercer paso</h4>
                                          </div>
                                          <div class="modal-body">
                                             <div class="alert alert-info" role="alert">
                                                <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo 
                                                   risus, porta ac consectetur ac, vestibulum at eros.Praesent commodo cursus magna, vel scelerisque nisl consectetur et. 
                                                   Vivamus sagittis lacus vel augue laoreet rutrum faucibusdolor auctor.Aenean lacinia bibendum nulla sed consectetur. 
                                                   Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non 
                                                   metus auctor fringilla.
                                                </p>
                                             </div>
                                             </div>
                                             <div class="modal-footer">
                                                <button type="button" id="guia_3a" class="btn btn-primary">Anterior</button>
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Finalizar</button>
                                             </div>
                                          </div>
                                       </div>
                                    </div>


                                 </div>
                              </div>
                           </div>
                        </div>
                        
                     


                     <!---------- CARUSEL DE IMAGENES ---------->
                     <div class="span12" id="carusel-index">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                           <!-- Indicators -->


                           <!-- Wrapper for slides -->
                           <div class="carousel-inner" role="listbox">
                              <div class="item active">
                                 <img src="../assets/img/index1.png" alt="...">
                                 <div class="carousel-caption">
                                    &nbsp;
                                 </div>
                              </div>
                              <div class="item">
                                 <img src="../assets/img/index2.png" alt="...">
                                 <div class="carousel-caption">
                                    &nbsp;
                                 </div>
                              </div>
                           </div>

                           <!-- Controls -->
                           <a class="icon-chevron-left left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                              <span class="sr-only"> &nbsp; </span>
                           </a>
                           <a class="icon-chevron-right right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                              <span class="sr-only"> &nbsp; </span>
                           </a>
                        </div>
                     </div>
                               
</div>

                  <div class="span6">
                     <div class="widget">
                        <div class="widget-header"> <i class="icon-bookmark"></i>
                           <h3>Acciones comunes</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                           <div class="shortcuts"> 
                              <a href="Alumno/frm_alumno.php" class="shortcut"><i class="shortcut-icon icon-user"></i><span class="shortcut-label"> Nuevo Alumno </span> </a>
                              <a href="Administrador/frm_administrador.php" class="shortcut"><i class="shortcut-icon  icon-group"></i><span class="shortcut-label"> Nuevo Administrador </span></a>
                              <a href="Pago/pagos.php" class="shortcut"><i class="shortcut-icon icon-money"></i> <span class="shortcut-label"> Nuevo Pago </span> </a>
                              <a href="Ciclo/ciclos.php" class="shortcut"> <i class="shortcut-icon icon-refresh"></i><span class="shortcut-label"> Nuevo Ciclos </span> </a>                              
                           </div>
                           <!-- /shortcuts --> 
                        </div>
                        <!-- /widget-content --> 
                     </div>
                     <!-- /span6 --> 
                  </div>
                  <div class="span6">
                     <!-- /widget -->                     
                     <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-th-list"></i>
                           <h3>Sitios de Interes</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                           <table class="table table-striped table-bordered">
                              <thead>
                                 <tr>
                                    <th> Página </th>
                                    <th> URL </th>
                                    <th class="td-actions"> </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td> <span class="label label-primary"><i class="icon-facebook "></i></span>&nbsp; Facebook </td>
                                    <td> https://www.facebook.com/ </td>
                                    <td class="td-actions"><a href="https://www.facebook.com/" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a></td>
                                 </tr>
                                 <tr>
                                    <td> <span class="label label-primary"><i class="icon-twitter"></i></span>&nbsp; Twitter </td>
                                    <td> https://twitter.com/ </td>
                                    <td class="td-actions"><a href="https://twitter.com/?lang=es" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a></td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                        <!-- /widget-content --> 
                     </div>
                     <!-- /widget --> 
                  </div>
                  <!-- /span6 --> 
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
                        <li><a href="index.php"> Inicio </a></li>
                        <li><a href="Alumno/alumnos.php"> Alumnos </a></li>
                        <li><a href="Pago/pagos.php"> Pagos </a></li>
                        <li><a href="Reportes/reportes.php"> Reportes </a></li>
                        <li><a href="Beca/becas.php"> Becas </a></li>
                        <li><a href="Ciclo/ciclos.php"> Ciclos </a></li>
                        <li><a href="Administrador/administradores.php"> Administradores</a></li>
                        <li><a href="Configuracion/configpublic.php"> Pagina Publicitaria</a></li>
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
      <!-- CSS DE PLANTILLA --> 
      <script type="text/javascript" src="../assets/js/jquery-1.7.2.min.js"></script> 
      <!--script src="js/excanvas.min.js"></script> 
<script src="js/chart.min.js" type="text/javascript"></script--> 

      <!-- CSS DE BOOTSTRAP -->
      <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
      <!--script src="js/base.js"></script--> 
      
      <script>
         $('#btn-info-1').popover('show');
         $('#btn-info-1').popover('hide');

         $('#guia-1').on('click', function () { 
            $('#paso-1').modal('hide')
            $('#paso-2').modal({
               show: true
            })
         });

         $('#guia-2').on('click', function () { 
            $('#paso-2').modal('hide')
            $('#paso-3').modal({
               show: true
            })
         });

         $('#guia-2a').on('click', function () { 
            $('#paso-2').modal('hide')
            $('#paso-1').modal({
               show: true
            })
         });

         $('#guia-3a').on('click', function () { 
            $('#paso-3').modal('hide')
            $('#paso-2').modal({
               show: true
            })
         });

         $('.carousel').carousel();
      </script>
   </body>
</html>
