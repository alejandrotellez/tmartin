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
                     <div class="widget ">
                        <div class="widget-header">
                           <i class="icon-user"></i>
                           <h3>Nuevo Usuario</h3>
                           <a href="alumnos.php"></a><h3><span class="glyphicon glyphicon-remove"></span></h3>
                        </div> <!-- /widget-header -->					
                        <div class="widget-content">

                           <div class="content">
                              <div class="pane" id="formcontrols">
                                 <form id="edit-profile" class="form-horizontal">
                                    <fieldset>                          
                                       <h6 class="bigstats">Información Personal del Alumno</h6>
                                       <div id="big_stats" class="cf">
                                          <div class="control-group">											
                                             <label class="control-label" for="username">Matricula</label>
                                             <div class="controls">
                                                <input type="text" class="span6 disabled" id="matricula" value="12002039" disabled>
                                                <p class="help-block">Dato no modificable</p>
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="username">Nombre</label>
                                             <div class="controls">
                                                <input type="text" class="span6 disabled" id="nombre" value="Jose" >
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="firstname">Apellido Paterno</label>
                                             <div class="controls">
                                                <input type="text" class="span6" id="a_paterno" value="Tellez">
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="lastname">Apellido Materno</label>
                                             <div class="controls">
                                                <input type="text" class="span6" id="a_materno" value="Aguilera">
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label">Sexo</label>
                                             <div class="controls">
                                                <label class="radio inline">
                                                   <input type="radio"  name="sexo"> Hombre
                                                </label>
                                                <label class="radio inline">
                                                   <input type="radio" name="sexo"> Mujer
                                                </label>
                                             </div>	<!-- /controls -->
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="radiobtns">Grado</label>
                                             <div class="controls">
                                                <select class="form-control">
                                                   <option>1</option>
                                                   <option>2</option>
                                                   <option>3</option>
                                                   <option>4</option>
                                                   <option>5</option>
                                                   <option>6</option>
                                                </select>
                                             </div>	<!-- /controls -->			
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="radiobtns">Grupo</label>
                                             <div class="controls">
                                                <select class="form-control">
                                                   <option>A</option>
                                                   <option>B</option>
                                                   <option>C</option>
                                                </select>
                                             </div>	<!-- /controls -->			
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label">Escolaridad</label>
                                             <div class="controls">
                                                <label class="radio inline">
                                                   <input type="radio"  name="preescolar"> Preescolar
                                                </label>
                                                <label class="radio inline">
                                                   <input type="radio" name="primaria"> Primaria
                                                </label>
                                             </div>	<!-- /controls -->
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="radiobtns">Beca</label>
                                             <div class="controls">
                                                <select class="form-control" name="beca">
                                                   <option>10%</option>
                                                   <option>20%</option>
                                                   <option>50%</option>
                                                   <option>60%</option>
                                                   <option>80%</option>
                                                   <option>100%</option>
                                                </select>
                                             </div>	<!-- /controls -->			
                                          </div> <!-- /control-group -->                                          
                                       </div> <!-- /big_stats -->
                                       <br />
                                       <h6 class="bigstats">Información del Tutor</h6>
                                       <div id="big_stats2" class="cf">
                                          <div class="control-group">											
                                             <label class="control-label" for="username">Nombre</label>
                                             <div class="controls">
                                                <input type="text" class="span6 disabled" id="nombre_tutor" value="Alejandro">
                                                <p class="help-block">Nombre o nombres del Tutor del alumno</p>
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="firstname">Apellido Paterno</label>
                                             <div class="controls">
                                                <input type="text" class="span6" id="a_paterno_tutor" value="Tellez">
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="lastname">Apellido Materno</label>
                                             <div class="controls">
                                                <input type="text" class="span6" id="a_materno_tutor" value="Aguilera">
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="email">Email</label>
                                             <div class="controls">
                                                <input type="email" class="span4" id="email_tutor" value="hola@ejemplo.com">
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="email">Telefono</label>
                                             <div class="controls">
                                                <input type="tel" class="span4" id="telefono_tutor" value="1234567890">
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->
                                       </div> <!-- /big_stats2 -->

                                       <div class="form-actions">
                                          <button type="submit" class="btn btn-primary">Guardar</button> 
                                          <button class="btn">Cancelar</button>
                                       </div> <!-- /form-actions -->
                                    </fieldset>
                                 </form>
                                 <a href="alumnos.php" class="btn btn-primary">Enviar</a>
                              </div>								
                           </div>

                        </div> <!-- /widget-content -->
                     </div> <!-- /widget -->
                  </div> <!-- /span12 -->
               </div> <!-- /row -->
            </div> <!-- /container -->
         </div> <!-- /main-inner -->
      </div> <!-- /main -->

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
                        <li><i class=" icon-twitter"></i>  <i class="icon-facebook"></i>  <i class="icon-youtube"></i><span> /teresamartin</span></li>
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
