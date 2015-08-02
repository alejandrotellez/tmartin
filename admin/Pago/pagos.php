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
      include_once '../Clases/Alumno.php';
      $alumno = new Alumno();
      $datos = $alumno->get_alumno($matricula);
      $row = $datos->fetchObject();
      //var_dump ($row);

      include_once '../Clases/Pago1.php';
      $pago = new Pago1();
      $datos2 = $pago->get_pago($matricula);
      //var_dump($row2);

      include_once '../Clases/Grado.php';
      $grado = new Grado();
      $grado1 = $grado->get_grado();

      include_once '../Clases/Grupo.php';
      $grupo = new Grupo();
      $grupo1 = $grupo->get_grupo();

      include_once '../Clases/Escolaridad.php';
      $escolaridad = new Escolaridad();
      $escolaridad1 = $escolaridad->get_escolaridad();

      include_once '../Clases/Beca.php';
      $becas = new Beca();
      $becas1 = $becas->get_beca();
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
      <link rel="shortcut icon" href="../../assets/img/ico/favicon.png">

      <!-- CSS DE BOOTSTRAP -->
      <link type="text/css" rel="stylesheet" href="../../assets/css/bootstrap.min.css">
      <link type="text/css" rel="stylesheet" href="../../assets/css/bootstrap-responsive.min.css">
      <!-- CSS DE PLANTILLA -->
      <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600">
      <link type="text/css" rel="stylesheet" href="../../assets/css/font-awesome2.css">
      <link type="text/css" rel="stylesheet" href="../../assets/css/style.css">
      <link type="text/css" rel="stylesheet" href="../../assets/css/pages/dashboard.css">
      <!-- CSS DE AAA Y ASOCIADOS -->
      <link type="text/css" rel="stylesheet" href="../../assets/css/styleAAA.css">
      <!-- CSS DE KETCHUP -->
      <link type="text/css" rel="stylesheet" href="../../assets/css/ketchup/jquery.ketchup.css">
      <link type="text/css" rel="stylesheet" href="../../assets/css/ketchup/jcomfirmaction.css">

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
               <a class="brand" href="../index.html">TERESA MARTIN </a>
               <div class="nav-collapse">
                  <ul class="nav pull-right">
                     <li>
                        <a href="../../index.php" ><i class="icon-home"></i>&nbsp;Página Publicitaria<b class="caret"></b></a>
                     </li>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i>&nbsp;<?php echo $_SESSION['nombre']?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                           <li><a href="javascript:;"><i class="icon-cog"></i><span>   Configuración </span></a></li>
                           <li><a href="../Administrador/login.php"><i class="icon-off"></i><span>   Cerrar Sesion </span></a></li>
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
                  <li class="active"><a href="pagos.php"><i class=" icon-money"></i><span>Pagos</span> </a> </li>
                  <li><a href="../Reportes/reportes.php"><i class="icon-list-alt"></i><span>Reportes</span> </a> </li>
                  <li><a href="../Beca/becas.php"><i class=" icon-bookmark"></i><span>Becas</span> </a> </li>
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
                           <a href="pagos.php" class="cerrar_frm"><i class=" icon-remove"></i></a>
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
                                                         <?php if(!isset($matricula)){
                     echo "<input type='text' class='span4 disabled form-control' name='matricula' id='matricula' data-validate='validate(required, number, rangelength(1,11))'><p class='help-block'>Inserte Matricula</p> 
                     </div> <!-- /controls -->
                                                   </div> <!-- /control-group -->
                                                   </div><!-- /big_stats -->
                                             </div><!-- /span6 -->";
                  }else{
                     echo "<p class='form-control-static'>$row->matricula</p><input type='hidden' name='matricula' value='$row->matricula?>'>
</div> <!-- /controls -->
                                                   </div> <!-- /control-group -->
                                                   <div class='control-group'>		
                                                      <label class='control-label' for='nombre'>Nombre</label>
                                                      <div class='controls'>
                                                         <p class='form-control-static'>$row->nombre $row->a_paterno $row->a_materno</p>
                                                         </div> <!-- /controls -->
                                                   </div> <!-- /control-group -->
                                                   <div class='control-group'>		
                                                      <label class='control-label' for='nombre'>Grado</label>
                                                      <div class='controls'>";
                     while ($grado2 = $grado1->fetchObject()){
                        if($row->idgrado == $grado2->idgrado)
                           echo "<p class='form-control-static'>$grado2->grado</p>";
                     }
                     echo "

                                                      </div> <!-- /controls -->
                                                   </div> <!-- /control-group -->
                                                   <div class='control-group'>		
                                                      <label class='control-label' for='nombre'>Grupo</label>
                                                      <div class='controls'>";
                     while ($grupo2 = $grupo1->fetchObject()){
                        if($row->idgrupo == $grupo2->idgrupo)
                           echo "<p class='form-control-static'>$grupo2->grupo</p>";
                     }
                     echo "
                                                      </div> <!-- /controls -->
                                                   </div> <!-- /control-group -->
                                                   <div class='control-group'>		
                                                      <label class='control-label' for='nombre'>Escolaridad</label>
                                                      <div class='controls'>";
                     while ($escolaridad2 = $escolaridad1->fetchObject()){
                        if($row->idescolaridad == $escolaridad2->idescolaridad)
                           echo "<p class='form-control-static'>$escolaridad2->escolaridad</p>";
                     }
                     echo "

                                                      </div> <!-- /controls -->
                                                   </div> <!-- /control-group -->
                                                   <div class='control-group'>		
                                                      <label class='control-label' for='nombre'>Beca</label>
                                                      <div class='controls'>";
                     while ($becas2 = $becas1->fetchObject()){
                        if($row->idbeca==$becas2->idbeca){
                           $descuento = $becas2->descuento*100;
                           echo "<p class='form-control-static'>$becas2->nombre con $descuento% de descuento</p>";
                        }         
                     }
                     echo"

                                                      </div> <!-- /controls -->
                                                   </div> <!-- /control-group -->
                                                   </div><!-- /big_stats -->
                                             </div><!-- /span6 -->
                                             <div class='span6'>
                                                <h6 class='bigstats'>Pagos a realizar</h6>
                                                <div class='control-group'>
                                                   <div id='big_stats' class='cf pagos'>
                                                   <table class='span4'>
                                                   ";
                     
                     $inscripcion= "inscripcion";
                     $datos3 = $pago->get_pago($matricula, $inscripcion); 
                     $row3 = $datos3->fetchObject();
                     if($row3 != false){                          
                        echo "<tr><td><div class='checkbox  disabled'><label class='mes_pago'>$row3->mes</label></div></td><td>pagado</td></tr>";
                     }else{
                        echo "<tr><td><div class='checkbox  disabled'><label> <input type='checkbox' name='mes[]' value='inscripcion'>Inscripción</label></div></td><td>$1500.00</td></tr>";
                     }

                     $agosto = "agosto";
                     $datos4 = $pago->get_pago($matricula, $agosto); 
                     $row4 = $datos4->fetchObject();
                     if($row4 != false){                         
                        echo "<tr><td><div class='checkbox  disabled'><label class='mes_pago'>$row4->mes</label></div></td><td>pagado</td></tr>";
                     }else{
                        echo "<tr><td><div class='checkbox  disabled'><label> <input type='checkbox' name='mes[]' value='agosto'>Agosto</label></div></td><td>$1500.00</td></tr>";
                     }

                     $septiembre = "septiembre";
                     $datos5 = $pago->get_pago($matricula, $septiembre); 
                     $row5 = $datos5->fetchObject();
                     if($row5 != false){                         
                        echo "<tr><td><div class='checkbox  disabled'><label class='mes_pago'>$row5->mes</label></div></td><td>pagado</td></tr>";
                     }else{
                        echo "<tr><td><div class='checkbox  disabled'><label> <input type='checkbox' name='mes[]' value='septiembre'>Septiembre</label></div></td><td>$1500.00</td></tr>";
                     }

                     $octubre = "octubre";
                     $datos6 = $pago->get_pago($matricula, $octubre);   
                     $row6 = $datos6->fetchObject();
                     if($row6 != false){                        
                        echo "<tr><td><div class='checkbox  disabled'><label class='mes_pago'>$row6->mes</label></div></td><td>pagado</td></tr>";
                     }else{
                        echo "<tr><td><div class='checkbox  disabled'><label> <input type='checkbox' name='mes[]' value='octubre'>Octubre</label></div></td><td>$1500.00</td></tr>";
                     }

                     $noviembre = "noviembre";
                     $datos7 = $pago->get_pago($matricula, $noviembre);   
                     $row7 = $datos7->fetchObject();
                     if($row7 != false){                        
                        echo "<tr><td><div class='checkbox  disabled'><label class='mes_pago'>$row7->mes</label></div></td><td>pagado</td></tr>";
                     }else{
                        echo "<tr><td><div class='checkbox  disabled'><label> <input type='checkbox' name='mes[]' value='noviembre'>Noviembre</label></div></td><td>$1500.00</td></tr>";
                     }

                     $diciembre = "diciembre";
                     $datos8 = $pago->get_pago($matricula, $diciembre);   
                     $row8 = $datos8->fetchObject();
                     if($row8 != false){                        
                        echo "<tr><td><div class='checkbox  disabled'><label class='mes_pago'>$row8->mes</label></div></td><td>pagado</td></tr>";
                     }else{
                        echo "<tr><td><div class='checkbox  disabled'><label> <input type='checkbox' name='mes[]' value='diciembre'>Diciembre</label></div></td><td>$1500.00</td></tr>";
                     }

                     $reinscripcion = "reinscripcion";
                     $datos9 = $pago->get_pago($matricula, $reinscripcion);   
                     $row9 = $datos9->fetchObject();
                     if($row9 != false){                        
                        echo "<tr><td><div class='checkbox  disabled'><label class='mes_pago'>$row9->mes</label></div></td><td>pagado</td></tr>";
                     }else{
                        echo "<tr><td><div class='checkbox  disabled'><label> <input type='checkbox' name='mes[]' value='reinscripcion'>Reinscripcion</label></div></td><td>$1500.00</td></tr>";
                     }

                     $enero = "enero";
                     $datos10 = $pago->get_pago($matricula, $enero);   
                     $row10 = $datos10->fetchObject();
                     if($row10 != false){                        
                        echo "<tr><td><div class='checkbox  disabled'><label class='mes_pago'>$row10->mes</label></div></td><td>pagado</td></tr>";
                     }else{
                        echo "<tr><td><div class='checkbox  disabled'><label> <input type='checkbox' name='mes[]' value='enero'>Enero</label></div></td><td>$1500.00</td></tr>";
                     }

                     $febrero = "febrero";
                     $datos11 = $pago->get_pago($matricula, $febrero);   
                     $row11 = $datos11->fetchObject();
                     if($row11 != false){                        
                        echo "<tr><td><div class='checkbox  disabled'><label class='mes_pago'>$row11->mes</label></div></td><td>pagado</td></tr>";
                     }else{
                        echo "<tr><td><div class='checkbox  disabled'><label> <input type='checkbox' name='mes[]' value='febrero'>Febrero</label></div></td><td>$1500.00</td></tr>";
                     }

                     $marzo = "marzo";
                     $datos12 = $pago->get_pago($matricula, $marzo);   
                     $row12 = $datos12->fetchObject();
                     if($row12 != false){                        
                        echo "<tr><td><div class='checkbox  disabled'><label class='mes_pago'>$row12->mes</label></div></td><td>pagado</td></tr>";
                     }else{
                        echo "<tr><td><div class='checkbox  disabled'><label> <input type='checkbox' name='mes[]' value='marzo'>Marzo</label></div></td><td>$1500.00</td></tr>";
                     }

                     $abril = "abril";
                     $datos13 = $pago->get_pago($matricula, $abril);   
                     $row13 = $datos13->fetchObject();
                     if($row13 != false){                        
                        echo "<tr><td><div class='checkbox  disabled'><label class='mes_pago'>$row13->mes</label></div></td><td>pagado</td></tr>";
                     }else{
                        echo "<tr><td><div class='checkbox  disabled'><label> <input type='checkbox' name='mes[]' value='abril'>Abril</label></div></td><td>$1500.00</td></tr>";
                     }

                     $mayo = "mayo";
                     $datos14 = $pago->get_pago($matricula, $mayo);   
                     $row14 = $datos14->fetchObject();
                     if($row14 != false){                        
                        echo "<tr><td><div class='checkbox  disabled'><label class='mes_pago'>$row14->mes</label></div></td><td>pagado</td></tr>";
                     }else{
                        echo "<tr><td><div class='checkbox  disabled'><label> <input type='checkbox' name='mes[]' value='mayo'>Mayo</label></div></td><td>$1500.00</td></tr>";
                     }

                     $junio = "junio";
                     $datos15 = $pago->get_pago($matricula, $junio);   
                     $row15 = $datos15->fetchObject();
                     if($row15 != false){                        
                        echo "<tr><td><div class='checkbox  disabled'><label class='mes_pago'>$row15->mes</label></div></td><td>pagado</td></tr>";
                     }else{
                        echo "<tr><td><div class='checkbox  disabled'><label> <input type='checkbox' name='mes[]' value='junio'>Junio</label></div></td><td>$1500.00</td></tr>";
                     }


                     echo "</table>
                                                   </div>
                                                </div>
                                             </div>
                                             ";
                  }?>


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
                  
                  <table>
                     

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
                  <!-- JAVASCRIPT DE PLANTILLA --> 
                  <script type="text/javascript" src="../../assets/js/jquery-1.7.2.min.js"></script> 
                  <!-- JAVASCRIPT DE BOOTSTRAP -->
                  <script type="text/javascript" src="../../assets/js/bootstrap.js"></script>
                  <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
                  <!-- JAVASCRIPT DE KETCHUP -->
                  <script type="text/javascript" src="../../assets/js/ketchup/jquery.js"></script>
                  <script type="text/javascript" src="../../assets/js/ketchup/jquery.ketchup.js"></script>
                  <script type="text/javascript" src="../../assets/js/ketchup/jquery.ketchup.validations.js"></script>
                  <script type="text/javascript" src="../../assets/js/ketchup/jquery.ketchup.helpers.js"></script>
                  <script type="text/javascript" src="../../assets/js/ketchup/jconfirmaction.jquery.js"></script>

                  <script> 
                     $(document).ready(function(){

                        $('.valimatricula').ketchup();
                        $('.valipago').ketchup();

                        <?php

if(!isset($_GET['matricula'])){
   echo " $('#matricula').modal(
   show: true
   );";
} ?>

                     })
                  </script>




                  </body>
               </html>