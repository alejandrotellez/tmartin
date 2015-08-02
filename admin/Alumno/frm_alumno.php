<?php

//  -------- Inicio de sesión --------
session_start();
if(!isset($_SESSION['login'])){
   header("Location: ../Administrador/login.php");
}

//  -------- DATOS GENERALES --------
include_once '../Clases/Sexo.php';
$sexo = new Sexo();
$datos2 = $sexo->get_sexo();

include_once '../Clases/Grado.php';
$grado = new Grado();
$datos3 = $grado->get_grado();

include_once '../Clases/Grupo.php';
$grupo = new Grupo();
$datos4 = $grupo->get_grupo();

include_once '../Clases/Escolaridad.php';
$escolaridad = new Escolaridad();
$datos5 = $escolaridad->get_escolaridad();

include_once '../Clases/Beca.php';
$becas = new Beca();
$datos6 = $becas->get_beca();

//  -------- DATOS PARA VER MAS DATOS --------
if(isset($_GET['ver'])){
   $ver = $_GET['ver'];
}

//  -------- DATOS PARA UPDATE --------
if(isset($_GET['matricula'])){
   $matricula = $_GET['matricula'];
   include_once '../Clases/Alumno.php';
   $alumno = new Alumno();
   $datos = $alumno->get_alumno($matricula);
   $row = $datos->fetchObject();

   include_once '../Clases/Tutor.php';
   $tutor = new Tutor();
   $idTutor = $row->idtutor;
   $datos1 = $tutor->get_tutor($idTutor, null);
   $row1 = $datos1->fetchObject();
   //var_dump($row1);
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
      <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600">
      <link type="text/css" rel="stylesheet" href="../../assets/css/font-awesome2.css">
      <link type="text/css" rel="stylesheet" href="../../assets/css/style.css">
      <link type="text/css" rel="stylesheet" href="../../assets/css/pages/dashboard.css">      
      <!-- CSS DE KETCHUP -->
      <link type="text/css" rel="stylesheet" href="../../assets/css/ketchup/jquery.ketchup.css">
      <link type="text/css" rel="stylesheet" href="../../assets/css/ketchup/jcomfirmaction.css">
      <!-- CSS DE AAA Y ASOCIADOS-->
      <link type="text/css" rel="stylesheet" href="../../assets/css/styleAAA.css">

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
               <a class="brand" href="../index.php">TERESA MARTIN </a>
               <div class="nav-collapse">
                  <ul class="nav pull-right">
                     <li>
                        <a href="../../index.php" ><i class="icon-home"></i>&nbsp;Página Publicitaria<b class="caret"></b></a>
                     </li>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i>&nbsp;<?php echo $_SESSION['nombre']?><b class="caret"></b></a>
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
                  <li class="active"><a href="alumnos.php"><i class=" icon-user"></i><span>Alumnos</span> </a> </li>
                  <li><a href="../Pago/pagos.php"><i class=" icon-money"></i><span>Pagos</span> </a> </li>
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
                  <div class="span12"> 
                     <div class="widget ">
                        <div class="widget-header">
                           <i class="icon-user"></i>

                           <!-- ============== FORMULARIO DE ALUMNO ============== -->
                           <h3>Inscripción de Nuevo Alumno</h3>
                           <a href="alumnos.php" class="cerrar_frm"><i class=" icon-remove"></i></a>
                        </div> <!-- /widget-header -->					
                        <div class="widget-content">
                           <div class="content">
                              <div class="pane" id="formcontrols">
                                 <form id="edit-profile" class="form-horizontal valialum" method="<?php
   if(isset($ver)){
   echo "get";
}else{
   echo "post";
}?>" action="<?php
if(isset($ver)){
   echo "frm_alumno.php";
}else{
   echo "agregar_alumno.php";
}?>">
                                    <fieldset>                          
                                       <h6 class="bigstats">Información Personal del Alumno</h6>
                                       <div id="big_stats" class="cf">
                                          <?php
if(isset($matricula)){?>
                                          <!-- ============== MATRICULA ============== -->
                                          <div class="control-group">
                                             <label class="control-label" for="matricula">Matricula</label>
                                             <div class="controls">
                                                <?php
   if(isset($_GET['matricula'])){
      if(isset($ver)){
         echo "<p class='form-control-static'>$row->matricula</p>";
         echo "<input type='hidden' name='matricula' value='$row->matricula'>";
      }else{
         echo "<input type='text' class='span6 disabled' name='matricula2' value='$row->matricula' id='matricula' disabled>";
         echo "<input type='hidden' name='matricula' value='$row->matricula'>";
      }
   }
                                                ?>
                                             </div> <!-- /controls -->
                                          </div> <!-- /control-group -->
                                          <?php 
}
                                          ?>
                                          <input type="hidden" name="idGg" value="<?php 
if(isset($matricula)){
   echo $row->idgg;
}else{
   echo "1";
}?>" >

                                          <!-- ============== NOMBRE ============== -->
                                          <div class="control-group">											
                                             <label class="control-label" for="nombre">Nombre</label>
                                             <div class="controls">
                                                <?php 
if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>$row->nombre</p>";
   }else{
      echo "<input type='text' class='span6 disabled form-control' name='nombre' id='nombre' value='$row->nombre' data-validate='validate(required, rangelength(1,25))'>";
   }
}else{
   echo "<input type='text' class='span6 disabled form-control' name='nombre' id='nombre' data-validate='validate(required, rangelength(1,25))'>";
}
                                                ?>		
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->

                                          <!-- ============== APELLIDO PATERNO ============== -->
                                          <div class="control-group">											
                                             <label class="control-label" for="a_paterno">Apellido Paterno</label>
                                             <div class="controls">
                                                <?php 
if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>$row->a_paterno</p>";
   }else{
      echo "<input type='text' class='span6 disabled form-control' name='a_paterno' id='a_paterno' value='$row->a_paterno' data-validate='validate(required, rangelength(1,25))'>";
   }
}else{
   echo "<input type='text' class='span6 disabled form-control' name='a_paterno' id='a_paterno' data-validate='validate(required, rangelength(1,25))'>";
}
                                                ?>	
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->

                                          <!-- ============== APELLIDO MATERNO ============== -->
                                          <div class="control-group">											
                                             <label class="control-label" for="a_materno">Apellido Materno</label>
                                             <div class="controls">
                                                <?php 
if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>$row->a_materno</p>";
   }else{
      echo "<input type='text' class='span6 disabled form-control' name='a_materno' id='a_materno' value='$row->a_materno' data-validate='validate(required, rangelength(1,25))'>";
   }
}else{
   echo "<input type='text' class='span6 disabled form-control' name='a_materno' id='a_materno' data-validate='validate(required, rangelength(1,25))'>";
}
                                                ?>	
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->

                                          <!-- ============== SEXO ============== -->
                                          <div class="control-group">											
                                             <label class="control-label">Sexo</label>
                                             <div class="controls">

                                                <?php 
if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>";
      while ($row2 = $datos2->fetchObject()){
         if($row->idsexo==$row2->idsexo){
            echo $row2->sexo;
         }
      }      
      echo "</p>";
   }else{
      while ($row2 = $datos2->fetchObject()){
         echo "<label class='radio inline sexo'><input type='radio' name='sexo' value='$row2->idsexo'";
         if($row->idsexo == $row2->idsexo){
            echo "checked='checked'";
         }
         echo">$row2->sexo</label>";
      }
   }
}else{
   while ($row2 = $datos2->fetchObject()){
      echo "<label class='radio inline sexo'><input type='radio' name='sexo' value='$row2->idsexo'>$row2->sexo</label>";
   }
}
                                                ?>




                                             </div>	<!-- /controls -->
                                          </div> <!-- /control-group -->

                                          <!-- ============== GRADO ============== -->
                                          <div class="control-group">											
                                             <label class="control-label" for="radiobtns">Grado</label>
                                             <div class="controls">
                                                <?php 
if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>";
      while ($row3 = $datos3->fetchObject()){
         if($row->idgrado==$row3->idgrado){
            echo $row3->grado;
         }
      }   
      echo "</p>";
   }else{
      echo "<select class='form-control' name='grado'>";
      while ($row3 = $datos3->fetchObject()){
         echo "<option value='$row3->idgrado'";
         if($row->idgrado==$row3->idgrado){
            echo "selected";
         }
         echo ">$row3->grado</option>";
      }
      echo "</select>";
   }
}else{
   echo "<select class='form-control' name='grado'>";
   while ($row3 = $datos3->fetchObject()){
      echo "<option value='$row3->idgrado'>$row3->grado</option>";
   }
   echo "</select>";

}
                                                ?>
                                             </div>	<!-- /controls -->			
                                          </div> <!-- /control-group -->

                                          <!-- ============== GRUPO ============== -->
                                          <div class="control-group">											
                                             <label class="control-label" for="radiobtns">Grupo</label>
                                             <div class="controls">
                                                <?php 
if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>";
      while ($row4 = $datos4->fetchObject()){
         if($row->idgrupo == $row4->idgrupo)
            echo $row4->grupo;
      }
      echo "</p>";
   }else{
      echo "<select class='form-control' name='grupo'>";
      while ($row4 = $datos4->fetchObject()){
         echo "<option value='$row4->idgrupo' class='grupo'";
         if($row->idgrupo==$row4->idgrupo){
            echo "selected";
         }
         echo ">$row4->grupo</option>";
      }                                                  
      echo "</select>";
   }
}else{
   echo "<select class='form-control' name='grupo'>";
   while ($row4 = $datos4->fetchObject()){
      echo "<option value='$row4->idgrupo' class='grupo'>$row4->grupo</option>";
   }
   echo "</select>";
}?>
                                             </div>	<!-- /controls -->			
                                          </div> <!-- /control-group -->

                                          <!-- ============== ESCOLARIDAD ============== -->
                                          <div class="control-group">											
                                             <label class="control-label">Escolaridad</label>
                                             <div class="controls">
                                                <?php
if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>";
      while ($row5 = $datos5->fetchObject()){
         if($row->idescolaridad==$row5->idescolaridad){
            echo $row5->escolaridad;
         }
      }
      echo "</p>";
   }else{
      while ($row5 = $datos5->fetchObject()){
         echo "<label class='radio inline sexo'><input type='radio' name='escolaridad' value='$row5->idescolaridad'";
         if($row->idescolaridad==$row5->idescolaridad){
            echo "checked='checked'";
         } 
         echo ">$row5->escolaridad</label>";
      }
   }
}else{
   while ($row5 = $datos5->fetchObject()){
      echo "<label class='radio inline sexo'><input type='radio' name='escolaridad' value='$row5->idescolaridad'>$row5->escolaridad</label>";
   }
}?>
                                             </div>	<!-- /controls -->
                                          </div> <!-- /control-group -->

                                          <!-- ============== BECA ============== -->
                                          <div class="control-group">											
                                             <label class="control-label" for="radiobtns">Beca</label>
                                             <div class="controls">
                                                <?php 
if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>";
      while ($row6 = $datos6->fetchObject()){
         if($row->idbeca==$row6->idbeca){
            $descuento = $row6->descuento*100;
            echo "$row6->nombre con %$descuento de descuento";
         }         
      }
      echo "</p>";
   }else{
      echo "<select class='form-control' name='beca'>";
      while ($row6 = $datos6->fetchObject()){
         $descuento = $row6->descuento*100;
         echo "<option value='$row6->idbeca'";
         if($row->idbeca==$row6->idbeca){
            echo "selected";
         }
         echo ">$row6->nombre de %$descuento</option>";
      }      
   }
   echo "</select>";
}else{
   echo "<select class='form-control' name='beca'>";
   while ($row6 = $datos6->fetchObject()){
      $descuento = $row6->descuento*100;
      echo "<option value='$row6->idbeca'>$row6->nombre de %$descuento</option>";}
   echo "</select>";


}?>
                                             </div>	<!-- /controls -->			
                                          </div> <!-- /control-group -->
                                       </div> <!-- /big_stats -->

                                       <br />
                                       <h6 class="bigstats">Información del Tutor</h6>
                                       <div id="big_stats2" class="cf">

                                          <!-- ============== NOMBRE DEL TUTOR ============== -->
                                          <div class="control-group">											
                                             <label class="control-label" for="username">Nombre</label>
                                             <div class="controls">
                                                <?php if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>$row1->nombre</p>";
   }else{
      echo "<input type='text' class='span6 disabled form-control' name='nombre_tutor' id='nombre_tutor' value='$row1->nombre'>";
      echo "<input type='hidden' name='idTutor' id='idTutor' value='$row->idtutor' data-validate='validate(required, rangelength(1,25))'>";
   }
}else{
   echo "<input type='text' class='span6 disabled form-control' name='nombre_tutor' id='nombre_tutor' data-validate='validate(required, rangelength(1,25))'>";
}?>		
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->

                                          <!-- ============== APELLIDO PATERNO DEL TUTOR ============== -->
                                          <div class="control-group">											
                                             <label class="control-label" for="firstname">Apellido Paterno</label>
                                             <div class="controls">
                                                <?php if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>$row1->a_paterno</p>";
   }else{
      echo "<input type='text' class='span6 disabled form-control' name='a_paterno_tutor' id='a_paterno_tutor' value='$row1->a_paterno' data-validate='validate(required, rangelength(1,25))'>";
   }
}else{
   echo "<input type='text' class='span6 disabled form-control' name='a_paterno_tutor' id='a_paterno_tutor' data-validate='validate(required, rangelength(1,25))'>";
}?>		

                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->

                                          <!-- ============== APELLIDO MATERNO DEL TUTOR ============== -->
                                          <div class="control-group">											
                                             <label class="control-label" for="lastname">Apellido Materno</label>
                                             <div class="controls">
                                                <?php if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>$row1->a_materno</p>";
   }else{
      echo "<input type='text' class='span6 disabled form-control' name='a_materno_tutor' id='a_materno_tutor' value='$row1->a_materno'data-validate='validate(required, rangelength(1,25))'>";
   }
}else{
   echo "<input type='text' class='span6 disabled form-control' name='a_materno_tutor' id='a_materno_tutor'data-validate='validate(required, rangelength(1,25))'>";
}?>		
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->

                                          <!-- ============== EMAIL DEL TUTOR ============== -->
                                          <div class="control-group">											
                                             <label class="control-label" for="email">Email</label>
                                             <div class="controls">
                                                <?php if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>$row1->email</p>";
   }else{
      echo "<input type='email' class='span6 disabled form-control' name='email_tutor' id='email_tutor' value='$row1->email' data-validate='validate(required, email)'>";
   }
}else{
   echo "<input type='email' class='span6 disabled form-control' name='email_tutor' id='email_tutor' data-validate='validate(required, email)'>";
}?>		
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->

                                          <!-- ============== TELEFONO DEL TUTOR ============== -->
                                          <div class="control-group">											
                                             <label class="control-label" for="telefono_tutor">Telefono</label>
                                             <div class="controls">
                                                <?php if(isset($matricula)){
   if(isset($ver)){
      echo "<p class='form-control-static'>$row1->telefono</p>";
   }else{
      echo "<input type='tel' class='span6 disabled form-control' name='telefono_tutor' id='telefono_tutor' value='$row1->telefono' data-validate='validate(required, number, rangelength(1,10))'>";
   }
}else{
   echo "<input type='tel' class='span6 disabled form-control' name='telefono_tutor' id='telefono_tutor' data-validate='validate(required, number, rangelength(1,10))'>";
}?>		
                                             </div> <!-- /controls -->				
                                          </div> <!-- /control-group -->

                                          <!-- ============== ESTATUS ============== -->
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
                        <li><a href="../index.php"> Inicio </a></li>
                        <li><a href="alumnos.php"> Alumnos </a></li>
                        <li><a href="../Pago/pagos.php"> Pagos </a></li>
                        <li><a href="../Reportes/reportes.php"> Reportes </a></li>
                        <li><a href="../Beca/becas.php"> Becas </a></li>
                        <li><a href="../Ciclo/ciclos.php"> Ciclos </a></li>
                        <li><a href="../Administrador/administradores.php"> Administradores</a></li>
                        <li><a href="../Configuracion/configpublic.php"> Pagina Publicitaria</a></li>
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


      <!-- ==================================================
JAVASCRIPT
================================================== -->       
      <!-- JAVASCRIPT DE BOOTSTRAP -->
      <script src="../../assets/js/bootstrap.js"></script>
      <!-- JAVASCRIPT DE PLANTILLA -->
      <script src="../../assets/js/jquery-1.7.2.min.js"></script>
      <!-- JAVASCRIPT DE KETCHUP-->
      <script src="../../assets/js/ketchup/jquery.js"></script>
      <script src="../../assets/js/ketchup/jquery.ketchup.js"></script>
      <script src="../../assets/js/ketchup/jquery.ketchup.validations.js"></script>
      <script src="../../assets/js/ketchup/jquery.ketchup.helpers.js"></script>
      <script src="../../assets/js/ketchup/jconfirmaction.jquery.js"></script>

      <script> 
         $(document).ready(function(){

            $('.valialum').ketchup();

         });
      </script>
   </body>
</html>