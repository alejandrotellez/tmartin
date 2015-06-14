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
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> Nombre del Administrador <b class="caret"></b></a>
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

                  <!-- ============== ACCIONES ============== -->                
                  <a href="#myModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a>

                  <!-- Modal -->
                  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel">Thank you for visiting EGrappler.com</h3>
                     </div>
                     <div class="modal-body">
                        <p>One fine body…</p>
                     </div>
                     <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button class="btn btn-primary">Save changes</button>
                     </div>
                  </div>


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
                              <a href="javascript:;" class="shortcut">
                                 <i class="shortcut-icon icon-pencil"></i><span class="shortcut-label">Editar Alumno</span> </a>
                              <a href="javascript:;" class="shortcut">
                                 <i class="shortcut-icon icon-trash"></i> <span class="shortcut-label">Eliminar Alumno</span></a>
                              <a href="javascript:;" class="shortcut">
                                 <i class="shortcut-icon icon-search"></i> <span class="shortcut-label">Buscar Alumno</span></a>                              </div>
                           <!-- /shortcuts --> 
                        </div>
                        <!-- /widget-content --> 
                     </div>
                     <!-- /span12 --> 
                  </div>


                  <div class="span12">
                     <!-- /widget -->                     
                     <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-th-list"></i>
                           <h3>Lista de Alumnos</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                           <table class="table table-striped table-bordered">
                              <thead>
                                 <tr>
                                    <th> Matricula </th>
                                    <th> Nombre </th>
                                    <th> Ciclo </th>
                                    <th> Grado </th>
                                    <th> Escolaridad </th>
                                    <th> Beca</th>
                                    <th class="td-actions"> </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td> 12002039</td>
                                    <td> José Alejandro Téllez Aguilera</td>
                                    <td> 9</td>
                                    <td> A</td>
                                    <td> Ingenieria</td>
                                    <td> Manutencion</td>
                                    <td class="td-actions">
                                       <a href="javascript:;" class="btn btn-small btn-invert">
                                          <i class="btn-icon-only icon-zoom-in"> </i></a>
                                       <a href="javascript: del_candidate();" class="btn btn-small btn-invert">
                                          <i class="btn-icon-only icon-pencil"> </i></a>
                                       <a href="del_candidate" onclick="del_candidate" role="button" class="btn btn-small btn-invert">
                                          <i class="btn-icon-only icon-trash"> </i></a>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
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
      <script src="js/jquery-1.7.2.min.js"></script> 
      <!--script src="js/excanvas.min.js"></script> 
<script src="js/chart.min.js" type="text/javascript"></script--> 
      <script src="js/bootstrap.js"></script>
      <!--script src="js/base.js"></script-->

      <script>
         
         function del_candidate(){
            alertify.confirm("Are you sure?", function (e) {
               if (e) {
                  $.ajax({
                     'url' : 
                     'type' : 'GET',
                     'dataType' : 'json',
                     'success' : function(data){
                     if(data){
                     if (data.status == 'success') {
                     alertify.success(data.msg);
                  }
                         if (data.status == 'error') {
                     alertify.error(data.msg); 
                  }
               }
               $('#candidate-'+id).hide('slow');
            }
                             });
         } else {

         }
         });
         }
      </script>

   </body>
</html>

