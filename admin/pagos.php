<?php

//  -------- Inicio de sesión --------
session_start();
if(!isset($_SESSION['login'])){
   header("Location: login.php");
}

//  -------- Get administradores --------

if(isset($_GET['matricula'])){
   if($_GET['matricula'] != null){
      $matricula = $_GET['matricula'];
      include_once 'Alumno.php';
      $alumno = new Alumno();
      $datos = $alumno->get_alumno($matricula);
      $row = $datos->fetchObject();
      //var_dump ($row);
   }
}


?>

<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <title>TERESA MARTIN</title>

      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <meta name="apple-mobile-web-app-capable" content="yes">

      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
      <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
      <link href="../css/font-awesome2.css" rel="stylesheet">
      <link href="../css/style.css" rel="stylesheet">
      <link href="../css/pages/dashboard.css" rel="stylesheet">

      <!---------- Style de AAA y Asociados ---------->
      <link href="../css/styleAAA.css" rel="stylesheet">
      
      <!-- KETCHUP-->
    <link href="../css/ketchup/jquery.ketchup.css" rel="stylesheet">
    <link href="../css/ketchup/jcomfirmaction.css" rel="stylesheet">

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
                    <li>
                        <a href="../index.php" ><i class="icon-home"></i>&nbsp;Página Publicitaria<b class="caret"></b></a>
                     </li>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i>&nbsp;<?php echo $_SESSION['nombre']?> <b class="caret"></b></a>
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
                  <li><a href="index.php"><i class="icon-home"></i><span>Inicio</span> </a> </li>
                  <li><a href="alumnos.php"><i class=" icon-user"></i><span>Alumnos</span> </a> </li>
                  <li class="active"><a href="pagos.php"><i class=" icon-money"></i><span>Pagos</span> </a> </li>
                  <li><a href="reportes.php"><i class="icon-list-alt"></i><span>Reportes</span> </a> </li>
                  <li><a href="becas.php"><i class=" icon-bookmark"></i><span>Becas</span> </a> </li>
                  <li><a href="ciclos.php"><i class=" icon-refresh"></i><span>Ciclos</span> </a> </li>
                  <li><a href="administradores.php"><i class=" icon-user"></i><span>Administradores</span> </a> </li>
                  <li><a href="configpublic.php"><i class="icon-cog"></i><span>Pagina Publicitaria</span> </a> </li>
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

                  <!-- ============== MODAL DE MATRICULA ============== -->
                  <div class="modal fade" id="matricula" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <a class="close" data-dismiss="modal" aria-label="Close"><i class=" icon-remove"></i></a>
                              <h4 class="modal-title" id="myModalLabel">Pago</h4>
                           </div>
                           <form action="pagos.php" method="get"  >
                              <div class="modal-body">                             
                                 <label>Inserte la matricula del alumno</label>
                                 <input type="text" class="span5 disabled form-control" id="matricula" name="matricula" >  
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                 <button type="submit" class="btn btn-primary">Pagar</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>

                  <!-- ============== FORMULARIO DE PAGO ============== -->  
                  <div class="span12"> 
                     <div class="widget ">
                        <div class="widget-header">
                           <i class="icon-user"></i>
                           <h3>Nuevo Pago</h3>
                           <a href="index.php" class="cerrar_frm"><i class=" icon-remove"></i></a>
                        </div> <!-- /widget-header -->					
                        <div class="widget-content">

                           <div class="content">
                              <div class="pane" id="formcontrols">
                                 <form id="edit-profile" class="form-horizontal valipago" <?php if(isset($matricula)){
   echo "action='agregar_pago.php' method='post'";
}else{
   echo "action='pagos.php' method='get'";}?> >
                                    <fieldset>
                                       <div class="container">
                                          <div class="row">
                                             <div class="span6">
                                                <h6 class="bigstats">Información Personal del Alumno</h6>
                                                <div id="big_stats" class="cf">
                                                   <div class="control-group">		
                                                      <label class='control-label' for='matricula'>Matricula</label>
                                                      <div class='controls'>
                                                         <?php if(isset($matricula)){
   echo "<p class='form-control-static'>".$row->matricula."</p><input type='hidden' name='matricula' value='".$row->matricula."'>";
}else{
   echo "<input type='text' class='span4 disabled form-control' name='matricula' id='matricula' data-validate='validate(required, number, rangelength(1,11))'><p class='help-block'>Inserte Matricula</p>";}?>
                                                      </div> <!-- /controls -->
                                                   </div> <!-- /control-group -->
                                                   <div class="control-group">		
                                                      <label class='control-label' for='nombre'>Nombre</label>
                                                      <div class='controls'>
                                                         <p class="form-control-static"><?php if(isset($matricula)){echo $row->nombre." ".$row->a_paterno." ".$row->a_materno;}?></p>

                                                      </div> <!-- /controls -->
                                                   </div> <!-- /control-group -->
                                                   <div class="control-group">		
                                                      <label class='control-label' for='nombre'>Salón</label>
                                                      <div class='controls'>
                                                         <p class="form-control-static"><?php if(isset($matricula)){echo $row->idgg." ".$row->idescolaridad;}?></p>
                                                      </div> <!-- /controls -->
                                                   </div> <!-- /control-group -->
                                                   <div class="control-group">		
                                                      <label class='control-label' for='nombre'>Beca</label>
                                                      <div class='controls'>
                                                         <p class="form-control-static"><?php if(isset($matricula)){echo $row->idbeca;}?></p>
                                                      </div> <!-- /controls -->
                                                   </div> <!-- /control-group -->
                                                </div></div>   

                                             <div class="span6">
                                                <h6 class="bigstats">Pagos a realizar</h6>
                                                <div class="control-group">
                                                   <div id="big_stats" class="cf pagos">
                                                      <div class="checkbox  disabled">
                                                         <label>
                                                            <input type="checkbox" name="mes[]" value="inscripcion">Inscripción
                                                         </label>
                                                      </div>
                                                      <div class="checkbox disabled">
                                                         <label>
                                                            <input type="checkbox" name="mes[]" value="agosto">Agosto
                                                         </label>
                                                      </div>
                                                      <div class="checkbox disabled">
                                                         <label>
                                                            <input type="checkbox" name="mes[]" value="septiembre">Septiembre
                                                         </label>
                                                      </div>
                                                      <div class="checkbox disabled">
                                                         <label>
                                                            <input type="checkbox" name="mes[]" value="octubre">Octubre
                                                         </label>
                                                      </div>
                                                      <div class="checkbox disabled">
                                                         <label>
                                                            <input type="checkbox" name="mes[]" value="noviembre">Noviembre
                                                         </label>
                                                      </div>
                                                      <div class="checkbox disabled">
                                                         <label>
                                                            <input type="checkbox" name="mes[]" value="diciembre">Diciembre
                                                         </label>
                                                      </div>
                                                      <div class="checkbox disabled">
                                                         <label>
                                                            <input type="checkbox" name="mes[]" value="reinscripcion">Reinscripcion
                                                         </label>
                                                      </div>
                                                      <div class="checkbox disabled">
                                                         <label>
                                                            <input type="checkbox" name="mes[]" value="enero">Enero
                                                         </label>
                                                      </div>
                                                      <div class="checkbox disabled">
                                                         <label>
                                                            <input type="checkbox" name="mes[]" value="febrero">Febrero
                                                         </label>
                                                      </div>
                                                      <div class="checkbox disabled">
                                                         <label>
                                                            <input type="checkbox" name="mes[]" value="marzo">Marzo
                                                         </label>
                                                      </div>
                                                      <div class="checkbox disabled">
                                                         <label>
                                                            <input type="checkbox" name="mes[]" value="abril">Abril
                                                         </label>
                                                      </div>
                                                      <div class="checkbox disabled">
                                                         <label>
                                                            <input type="checkbox" name="mes[]" value="mayo">Mayo
                                                         </label>
                                                      </div>
                                                      <div class="checkbox disabled">
                                                         <label>
                                                            <input type="checkbox" name="mes[]" value="junio">Junio
                                                         </label>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>

                                          </div> <!-- /big_stats -->
                                          <div class="form-actions">
                                             <button type="submit" class="btn btn-primary">Pagar</button> 
                                             <button class="btn">Cancelar</button>
                                          </div> <!-- /form-actions -->
                                       </div>
                                    </fieldset>
                                 </form>                                 
                              </div>								
                           </div>

                        </div> <!-- /widget-content -->
                     </div> <!-- /widget -->
                  </div> <!-- /span12 -->

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
      <script src="../js/jquery-1.7.2.min.js"></script> 
      <!--script src="js/excanvas.min.js"></script> 
<script src="js/chart.min.js" type="text/javascript"></script--> 
      <script src="../js/bootstrap.js"></script>
      <!--script src="js/base.js"></script-->
      
      <script src="../js/ketchup/jquery.js"></script>
    <script src="../js/ketchup/jquery.ketchup.js"></script>
    <script src="../js/ketchup/jquery.ketchup.validations.js"></script>
    <script src="../js/ketchup/jquery.ketchup.helpers.js"></script>
    <script src="../js/ketchup/jconfirmaction.jquery.js"></script>
    
    <script> 
      $(document).ready(function(){
          
		  $('.valimatricula').ketchup();
		  $('.valipago').ketchup();
         
         <?php

if(!isset($_GET['matricula'])){
   echo " $('#matricula').modal({
               show: true;
            })
         ";
}


      ?>
      });
  </script>

      


   </body>
</html>

