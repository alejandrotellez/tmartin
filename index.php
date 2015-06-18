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
                
                
                 <div class="span12">
                    <div class="widget">
                       <div class="widget-hearder">
                          <a data-toggle="collapse" data-parent="#accordion" href="#guia" aria-expanded="true" aria-controls="collapseOne">
           <div class="page-header">
            <h1>Guia Rápida <span><small>Sistema Web Teresa Martin</small></span></h1>
           </div>
          </a>
                       </div>
                       <div class="widget-content">
                          <div id="guia" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                 <div class="panel-body">
                 <div class="alert alert-info" role="alert">
                <h2>Bienvenido a la guía rápida de introducción aquí están tus datos rectifica que sean los correctos</h2>
                <br>
                 </div>

                <button type="button" class="btn btn-lg btn-danger center-block" id="btn-info-1" data-toggle="popover" 
                    title="Tu nombre completo" 
                    data-content="Tue nombre es : <?php echo $_SESSION['nombre']; echo "<br>";?> Tus Privilegios son:<?php echo $_SESSION['privilegios'];echo "<br>";?> Tu matricula es:<?php echo $_SESSION['idAdministrador'];echo "<br>";?> Tu contraseña es: <?php echo $_SESSION['password'];?>">
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

                    <div class="modal fade bs-modal-1"  tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                          </div>
                        </div>

                    </div>

                    <!--   -------------------------modal 2 ----------------------     -->

                    <div class="modal fade bs-modal-2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                          </div>
                        </div>

                    </div>

                    <!--   -------------------------modal 3 ----------------------     -->

                    <div class="modal fade bs-modal-3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Tercer paso</h4>
                              </div>
                              <div class="modal-body">
                                                      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                                        <!-- Indicators -->
                                                        <ol class="carousel-indicators">
                                                          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                                          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                                          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                                        </ol>

                                                        <!-- Wrapper for slides -->
                                                        <div class="carousel-inner" role="listbox">
                                                          <div class="item active">
                                                            <img src="img/Boopstrap.png" alt="...">
                                                            <div class="carousel-caption">
                                                              Bootstrap
                                                            </div>
                                                          </div>
                                                          <div class="item">
                                                            <img src="img/Php.png" alt="...">
                                                            <div class="carousel-caption">
                                                              Php
                                                            </div>
                                                          </div>
                                                          <div class="item">
                                                            <img src="img/Tw.png" alt="...">
                                                            <div class="carousel-caption">
                                                              Html 5 - Css 3 - Java script
                                                            </div>
                                                          </div>
                                                        </div>

                                                        <!-- Controls -->
                                                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                                          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                          <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                                          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                          <span class="sr-only">Next</span>
                                                        </a>
                                                      </div>
                                                      <br>
                                                      <br>
                                                      <p>las tecnologias usadas en esta aplicacion</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                          </div>
                        </div>
                    </div>


             </div>
               </div>
                       </div>
                    </div>
                 </div>
                                  
                                  
                                  
                                   
                  <div class="span6">
                     <div class="widget">
                        <div class="widget-header"> <i class="icon-bookmark"></i>
                           <h3>Important Shortcuts</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                           <div class="shortcuts"> <a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-list-alt"></i><span
                                                                                                                                            class="shortcut-label">Apps</span> </a><a href="javascript:;" class="shortcut"><i
                       class="shortcut-icon icon-bookmark"></i><span class="shortcut-label">Bookmarks</span> </a><a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-signal"></i> <span class="shortcut-label">Reports</span> </a><a href="javascript:;" class="shortcut"> <i class="shortcut-icon icon-comment"></i><span class="shortcut-label">Comments</span> </a><a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-user"></i><span
                           class="shortcut-label">Users</span> </a><a href="javascript:;" class="shortcut"><i
                                                                                                              class="shortcut-icon icon-file"></i><span class="shortcut-label">Notes</span> </a><a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-picture"></i> <span class="shortcut-label">Photos</span> </a><a href="javascript:;" class="shortcut"> <i class="shortcut-icon icon-tag"></i><span class="shortcut-label">Tags</span> </a> </div>
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
                           <h3>A Table Example</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                           <table class="table table-striped table-bordered">
                              <thead>
                                 <tr>
                                    <th> Free Resource </th>
                                    <th> Download</th>
                                    <th class="td-actions"> </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td> Fresh Web Development Resources </td>
                                    <td> http://www.egrappler.com/ </td>
                                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                                 </tr>
                                 <tr>
                                    <td> Fresh Web Development Resources </td>
                                    <td> http://www.egrappler.com/ </td>
                                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                                 </tr>
                                 <tr>
                                    <td> Fresh Web Development Resources </td>
                                    <td> http://www.egrappler.com/ </td>
                                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                                 </tr>
                                 <tr>
                                    <td> Fresh Web Development Resources </td>
                                    <td> http://www.egrappler.com/ </td>
                                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                                 </tr>
                                 <tr>
                                    <td> Fresh Web Development Resources </td>
                                    <td> http://www.egrappler.com/ </td>
                                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
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
      <script src="js/jquery-1.7.2.min.js"></script> 
      <!--script src="js/excanvas.min.js"></script> 
<script src="js/chart.min.js" type="text/javascript"></script--> 
   
     
      <script src="js/bootstrap.js"></script>
      <!--script src="js/base.js"></script--> 
<script>
		$('#btn-info-1').popover('show')
		$('#btn-info-1').popover('hide')
	</script>
   </body>
</html>
