<?php

//  -------- Inicio de sesión --------
session_start();
if(!isset($_SESSION['login'])){
   header("Location: login.php");
}

//  -------- DATOS PARA UPDATE --------
if(isset($_GET['matricula'])){
   $matricula = $_GET['matricula'];
   include_once 'Alumno.php';
   $alumno = new Alumno();
   $datos = $alumno->get_alumno($matricula);
   $row = $datos->fetchObject();
   
   include_once 'Tutor.php';
   $tutor = new Tutor();
   $idTutor = $row->idtutor;
   $datos1 = $tutor->get_tutor($idTutor, null);
   $row1 = $datos1->fetchObject();
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
                  <li><a href="index.php"><i class="icon-home"></i><span>Inicio</span> </a> </li>
                  <li class="active"><a href="alumnos.php"><i class=" icon-user"></i><span>Alumnos</span> </a> </li>
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
                           <h3>Inscripción de Nuevo Alumno</h3>
                           <a href="alumnos.php" class="cerrar_frm"><i class=" icon-remove"></i></a>
                        </div> <!-- /widget-header -->					
                        <div class="widget-content">
                           <div class="content">
                              <div class="pane" id="formcontrols">
                                 <form id="edit-profile" class="form-horizontal" method="<?php
if(isset($ver)){
   echo "get";
}else{
   echo "post";
}?>" action="<?php
if(isset($ver)){
   echo "frm_alumno.php";
}else{
   echo "agregar_alumno.php";
}
             ?>">
                                    <fieldset>                          
                                       <h6 class="bigstats">Información Personal del Alumno</h6>
                                       <div id="big_stats" class="cf">
                                          <?php
if(isset($matricula)){?>
                                          <div class="control-group">
                                             <label class="control-label" for="matricula">Matricula</label>
                                             <div class="controls">
                                                <?php
   if(isset($ver)){
      echo "<p class='form-control-static'>$row->matricula</p>";
      echo "<input type='hidden' name='matricula' value='$row->matricula'>";
   }else{
      echo "<input type='text' class='span6 disabled' name='matricula' value='$row->matricula' id='matricula' disabled>";
   }?>


                                             </div> <!-- /controls -->
                                          </div> <!-- /control-group -->
                                          <?php }?>

                                          <div class="control-group">											
                                             <label class="control-label" for="nombre">Nombre</label>
                                             <div class="controls">
                                                <?php if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>$row->nombre</p>";
   }else{
      echo "<input type='text' class='span6 disabled' name='nombre' id='nombre' value='$row->nombre'>";
   }
}else{
   echo "<input type='text' class='span6 disabled' name='nombre' id='nombre'>";
}?>		
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="a_paterno">Apellido Paterno</label>
                                             <div class="controls">
                                                <?php if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>$row->a_paterno</p>";
   }else{
      echo "<input type='text' class='span6 disabled' name='a_paterno' id='a_paterno' value='$row->a_paterno'>";
   }
}else{
   echo "<input type='text' class='span6 disabled' name='a_paterno' id='a_paterno'>";
}?>	
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="a_materno">Apellido Materno</label>
                                             <div class="controls">
                                                <?php if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>$row->a_materno</p>";
   }else{
      echo "<input type='text' class='span6 disabled' name='a_materno' id='a_materno' value='$row->a_materno'>";
   }
}else{
   echo "<input type='text' class='span6 disabled' name='a_materno' id='a_materno'>";
}?>	
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label">Sexo</label>
                                             <div class="controls">
                                                <?php if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>";
      if($row->idsexo==3){
         echo "Hombre";
      }else{
         echo "Mujer";
      }
      echo "</p>";;
   }else{
      echo "<label class='radio inline'><input type='radio' name='sexo' value='4'";
      if($row->idsexo == 4){echo "checked='checked'";}
      echo "> Mujer</label>";
      echo "<label class='radio inline'><input type='radio' name='sexo' value='3'";
      if($row->idsexo == 3){echo "checked='checked'";}
      echo "> Hombre</label>";
   }
}else{
   echo "<label class='radio inline'><input type='radio' name='sexo' value='4'> Mujer</label>";
   echo "<label class='radio inline'><input type='radio' name='sexo' value='3'> Hombre</label>";
}?>




                                             </div>	<!-- /controls -->
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="radiobtns">Grado</label>
                                             <div class="controls">
                                                <?php 
if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>$row->idgrado</p>";
   }else{
      echo "<select class='form-control' name='grado'>
                                                   <option value='1'"; if($row->idgrado==1){echo "selected";} echo ">1</option>
                                                   <option value='2'"; if($row->idgrado==2){echo "selected";} echo ">2</option>
                                                   <option value='3'"; if($row->idgrado==3){echo "selected";} echo ">3</option>
                                                   <option value='4'"; if($row->idgrado==4){echo "selected";} echo ">4</option>
                                                   <option value='5'"; if($row->idgrado==5){echo "selected";} echo ">5</option>
                                                   <option value='6'"; if($row->idgrado==6){echo "selected";} echo ">6</option>
                                                </select>";
   }
}else{
   echo "<select class='form-control' name='grado'>
                                                   <option value='1'> 1 </option>
                                                   <option value='2'> 2 </option>
                                                   <option value='3'> 3 </option>
                                                   <option value='4'> 4 </option>
                                                   <option value='5'> 5 </option>
                                                   <option value='6'> 6 </option>
                                                </select>";   
}?>
                                             </div>	<!-- /controls -->			
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="radiobtns">Grupo</label>
                                             <div class="controls">
                                                <?php 
if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>$row->idgrupo</p>";
   }else{
      echo "<select class='form-control' name='grupo'>
                                                   <option value='a'"; if($row->idgrupo=="a"){echo "selected";} echo ">A</option>
                                                   <option value='b'"; if($row->idgrupo=="b"){echo "selected";} echo ">B</option>
                                                   <option value='c'"; if($row->idgrupo=="c"){echo "selected";} echo ">C</option>
                                                </select>";
   }
}else{
   echo "<select class='form-control' name='grupo'>
                                                   <option value='a'>A</option>
                                                   <option value='b'>B</option>
                                                   <option value='c'>C</option>
                                                </select>";   
}?>
                                             </div>	<!-- /controls -->			
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label">Escolaridad</label>
                                             <div class="controls">
                                                <?php
if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>";
      if($row->idescolaridad==2){
         echo "Preescolar";
      }else{
         echo "Primaria";
      }
      echo "</p>";
   }else{
      echo "<label class='radio inline'><input type='radio'  name='escolaridad' value='2'"; 
      if($row->idescolaridad==2){
         echo "checked='checked'";
      } 
      echo "> Preescolar </label>";
      echo "<label class='radio inline'><input type='radio'  name='escolaridad' value='1'"; 
      if($row->idescolaridad==1){
         echo "checked='checked'";
      } 
      echo "> Primaria </label>";
   }
}else{
   echo "<label class='radio inline'><input type='radio'  name='escolaridad' value='2'> Preescolar </label><label class='radio inline'><input type='radio'  name='escolaridad' value='1'> Primaria </label>";
}?>
                                             </div>	<!-- /controls -->
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="radiobtns">Beca</label>
                                             <div class="controls">
                                                <?php 
if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>";
      if($row->idbeca==1){echo "25%";}
      if($row->idbeca==2){echo "50%";}
      if($row->idbeca==3){echo "75%";}
      if($row->idbeca==4){echo "100%";}
      echo "</p>";
   }else{
      echo "<select class='form-control' name='beca'>
                                                   <option value='1'"; if($row->idbeca==1){echo "selected";} echo ">25%</option>
                                                   <option value='2'"; if($row->idbeca==2){echo "selected";} echo ">50%</option>
                                                   <option value='3'"; if($row->idbeca==3){echo "selected";} echo ">75%</option>
                                                   <option value='4'"; if($row->idbeca==4){echo "selected";} echo ">100%</option>
                                                </select>";
      }
}else{
   echo "<select class='form-control' name='beca'>
                                                   <option value='1'>25%</option>
                                                   <option value='2'>50%</option>
                                                   <option value='3'>75%</option>
                                                   <option value='4'>100%</option>
                                                </select>";
}?>
                                             </div>	<!-- /controls -->			
                                          </div> <!-- /control-group -->
                                       </div> <!-- /big_stats -->

                                       <br />
                                       <h6 class="bigstats">Información del Tutor</h6>
                                       <div id="big_stats2" class="cf">
                                          <div class="control-group">											
                                             <label class="control-label" for="username">Nombre</label>
                                             <div class="controls">
                                                <?php if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>$row1->nombre</p>";
   }else{
      echo "<input type='text' class='span6 disabled' name='nombre_tutor' id='nombre_tutor' value='$row1->nombre'>";
      echo "<input type='hidden' name='idTutor' id='idTutor' value='$row1->idtutor'>";
   }
}else{
   echo "<input type='text' class='span6 disabled' name='nombre_tutor' id='nombre_tutor'>";
}?>		
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="firstname">Apellido Paterno</label>
                                             <div class="controls">
                                               <?php if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>$row1->a_paterno</p>";
   }else{
      echo "<input type='text' class='span6 disabled' name='a_paterno_tutor' id='a_paterno_tutor' value='$row1->a_paterno'>";
   }
}else{
   echo "<input type='text' class='span6 disabled' name='a_paterno_tutor' id='a_paterno_tutor'>";
}?>		
                                                
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="lastname">Apellido Materno</label>
                                             <div class="controls">
                                                <?php if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>$row1->a_materno</p>";
   }else{
      echo "<input type='text' class='span6 disabled' name='a_materno_tutor' id='a_materno_tutor' value='$row1->a_materno'>";
   }
}else{
   echo "<input type='text' class='span6 disabled' name='a_materno_tutor' id='a_materno_tutor'>";
}?>		
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="email">Email</label>
                                             <div class="controls">
                                                <?php if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>$row1->email</p>";
   }else{
      echo "<input type='email' class='span6 disabled' name='email_tutor' id='email_tutor' value='$row1->email'>";
   }
}else{
   echo "<input type='email' class='span6 disabled' name='email_tutor' id='email_tutor'>";
}?>		
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->
                                          <div class="control-group">											
                                             <label class="control-label" for="telefono_tutor">Telefono</label>
                                             <div class="controls">
                                                <?php if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>$row1->telefono</p>";
   }else{
      echo "<input type='tel' class='span6 disabled' name='telefono_tutor' id='telefono_tutor' value='$row1->telefono'>";
   }
}else{
   echo "<input type='tel' class='span6 disabled' name='telefono_tutor' id='telefono_tutor'>";
}?>		
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->
                                          <input type="hidden" name="estatus" value="1">
                                       </div> <!-- /big_stats2 -->

                                       <div class="form-actions">
                                          <button type="submit" class="btn btn-primary">
                                            <?php
if(isset($ver)){
   echo "Editar";
}else{
   echo " Guardar";
}?>
                                         </button>
                                         <a href="alumnos.php" type="button" class="btn">Cancelar</a> 
                                          <!--button class="btn">Cancelar</button-->
                                       </div> <!-- /form-actions -->
                                    </fieldset>
                                 </form>
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