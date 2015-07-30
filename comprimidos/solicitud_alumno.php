<?php 

session_start();

if(isset($_GET['matricula_solicitud'])){   
   include_once 'admin/Alumno.php';
   $alumno = new Alumno();
   $matricula = $_GET['matricula_solicitud'];
   $datos = $alumno->get_alumno($matricula);
   $row = $datos->fetchObject();
   
   include_once 'admin/Tutor.php';
   $tutor = new Tutor();
   $idTutor = $_GET['matricula_tutor'];
   $datos1 = $tutor->get_tutor($idTutor, null);
   $row1 = $datos1->fetchObject();
}

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="shortcut icon" href="img/ico/favicon.png">

      <title>Teresa Martin</title>

      <!-- Bootstrap core CSS -->
      <link href="css/bootstrap2.css" rel="stylesheet">

      <!-- Custom styles for this template -->
      <link href="css/stylepublic.css" rel="stylesheet">
      
      <!-- AAA y Asociados -->
      <link href="css/styleAAA.css" rel="stylesheet">
      
       <!-- KETCHUP-->
    <link href="css/ketchup/jquery.ketchup.css" rel="stylesheet">
    <link href="css/ketchup/jcomfirmaction.css" rel="stylesheet">

      <script src="js/modernizr.custom.js"></script>		

      <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
<script src="../../assets/js/html5shiv.js"></script>
<script src="../../assets/js/respond.min.js"></script>
<![endif]-->
   </head>

   <body>

      <header class="header"> 
         <div class="container">

            <div class="row">

               <div class="col-md-3">
                  <div class="logo">
                     <a href="index.php">Teresa Martin</a>
                  </div>
               </div>

               <!-- MENU -->
               <div class="col-md-9">
                  <div class="menu">
                     <div id="dl-menu" class="dl-menuwrapper">
                        <button class="dl-trigger">Abrir Menu</button>
                        <ul class="dl-menu">
                           <li ><a href="index.php">Inicio</a></li>
                           <li ><a href="nosotros.php">Nosotros</a></li>
                           <li class="current"><a href="#">Servicios</a>
                              <ul class="dl-submenu">
                                 <li><a href="preescolar.php">Preescolar</a></li>
                                 <li><a href="primaria.php">Primaria</a></li>
                                 <li><a href="pastoral.php">Pastoral</a></li>
                                 <li><a href="familia.php">Familia</a></li>
                              </ul>
                           </li>
                           <li><a href="noticias.php">Noticias</a></li>
                           <li ><a href="contacto.php">Contacto</a></li>
                           <?php
if(isset($_SESSION['nombre'])){
   echo "<li><a href='#'>Tareas de Administrador</a>
                              <ul class='dl-submenu'>
                                 <li><a href='admin/index.php'>Inicio</a></li>
                                 <li><a href='admin/alumnos.php'>Alumnos</a></li>
                                 <li><a href='admin/pagos.php'>Pagos</a></li>
                                 <li><a href='admin/reportes.php'>Reportes</a></li>
                                 <li><a href='admin/becas.php'>Becas</a></li>
                                 <li><a href='admin/ciclos.php'>Ciclos</a></li>
                                 <li><a href='admin/administradores.php'>Administradores</a></li>
                                 <li><a href='admin/configpublic.php'>Pagina Publica</a></li>
                              </ul>
                           </li>";
}else{
   echo "<li><a href='admin/index.php'>Administrador</a>";
}
?>                           
                        </ul>
                     </div> 
                  </div><!-- /.menu --> 
               </div>

            </div>

         </div>
      </header>	

      <!-- IMAGEN DE PAGINA -->
      <div class="page_banner">

         <!-- start page_title -->
         <img src="images/page_banner_contact.jpg" alt="" />
         <!-- end page_title --> 

      </div>

      <!-- start content -->
      <div class="content">

         <!-- start block -->		
         <div class="block">
            <div class="container">



               <div class="row">

                  <!-- begin main -->
                  <div class="col-sm-12">
                     <!-- FORMULARIO DE SOLICITUD DE NUEVO ALUMNO -->
                     <?php
if(isset($matricula)){
   echo "<h2>LOS DATOS DE TU SOLICITUD DE INGRESO SON:</h2>";
}else{
   echo "<h2>SOLICITUD DE INGRESO</h2>";
}
                     ?>
                     <span class="line" >
                        <span class="sub-line" ></span>
                     </span>
                     
                     
                     <div class="ajax-contact-form">
                        <div class="form">
                           <div class="form-holder">
                              <div class="notification canhide"></div>
                              <form id="frm_contact" name="#" action="<?php
if(isset($matricula)){
   echo "#";
}else{
   echo "admin/agregar_alumno.php";
}
                     ?>
                                " method="post" class="valialum" id="form_solicitud">
                                 <div class="page-header">
                                 <h4>Información Personal del Alumno</h4>
                              </div>

                                 <div class="field">
                                    <label for="nombre">Nombre <span class="required">*</span></label>
                                    <div class="inputs">
                                      <?php
if(isset($matricula)){
   echo "<label>$row->nombre</label>";
}else{
   echo "<input class='aweform form-control' type='text' id='nombre' name='nombre' data-validate='validate(required, rangelength(1,25))'/>";
}
                     ?>
                                      
                                                         
                                    </div>  
                                 </div>
                                 <div class="field">
                                    <label for="a_paterno">Apellido Paterno <span class="required">*</span></label>
                                    <div class="inputs">
                                      <?php
if(isset($matricula)){
   echo "<label>$row->a_paterno</label>";
}else{
   echo "<input class='aweform form-control' type='text' id='a_paterno' name='a_paterno' data-validate='validate(required, rangelength(1,25))'/>";
}
                     ?>                                                        
                                    </div>  
                                 </div>
                                 <div class="field">
                                    <label for="a_materno">Apellido Materno <span class="required">*</span></label>
                                    <div class="inputs">
                                      <?php
if(isset($matricula)){
   echo "<label>$row->a_materno</label>";
}else{
   echo "<input class='aweform form-control' type='text' id='a_materno' name='a_materno' data-validate='validate(required, rangelength(1,25))'/>";
}
                     ?>             
                                    </div>  
                                 </div>
                                 <div class="field">
                                    <label for="sexo">Sexo <span class="required">*</span></label>
                                    <div class="inputs">
                                      <?php
if(isset($matricula)){
   if($row->idsexo == 4){
      echo "<label>Mujer</label>";
   }else{
      echo "<label>Hombre</label>";
   }
   
}else{
   echo " <label class='radio inline'><input type='radio' name='sexo' value='4'> Mujer</label>
                                             <label class='radio inline'><input type='radio' name='sexo' value='3'> Hombre</label>";
}
                     ?>    
                                    </div>  
                                 </div>
                                 <div class="field">
                                    <label for="grado"> Grado <span class="required">*</span></label>
                                    <div class="inputs">
                                      <?php 
if(isset($matricula)){   
      echo "<label>$row->idgrado</label>";
   
}else{
   echo "<select class='form-control aweform' name='grado'>
                                                   <option value='1'> 1 </option>
                                                   <option value='2'> 2 </option>
                                                   <option value='3'> 3 </option>
                                                   <option value='4'> 4 </option>
                                                   <option value='5'> 5 </option>
                                                   <option value='6'> 6 </option>
                                                </select>";   
}?>
                                      
                                       
                                    </div>  
                                 </div>
                              <div class="field">
                                    <label for="grupo"> Grupo <span class="required">*</span></label>
                                    <div class="inputs">
                                      <?php 
if(isset($matricula)){
   if($row->idgrupo == "a"){echo "<label>A</label>";}
   if($row->idgrupo == "b"){echo "<label>B</label>";}
   if($row->idgrupo == "c"){echo "<label>C</label>";}
   
}else{
   echo "<select class='form-control aweform' name='grupo'>
                                                   <option value='a'>A</option>
                                                   <option value='b'>B</option>
                                                   <option value='c'>C</option>
                                                </select>";   
}?>                                       
                                    </div>  
                                 </div>
                                 <div class="field control-group">
                                    <label for="escolaridad">Escolaridad <span class="required">*</span></label>
                                    <div class="inputs controls">
                                      <?php
if(isset($matricula)){
   if($row->idescolaridad == 2){echo "<label>Preescolar</label>";}
   if($row->idescolaridad == 1){echo "<label>Primaria</label>";}
}else{
   echo "<label class='radio inline'><input type='radio'  name='escolaridad' value='2'> Preescolar </label><label class='radio inline'><input type='radio'  name='escolaridad' value='1'> Primaria </label>";
}?>                                     
                                       
                                    </div>  
                                 </div>
                                 
                                 <input type="hidden" value="1" name="beca">
                                       <input type="hidden" name="estatus" value="3">
                                       <input type="hidden" name="idGg" value="1">
                                       
                                 <div class="page-header">
                                 <h4>Información Personal del Tutor</h4>
                              </div>
                                <div class="field">
                                    <label for="nombre_tutor">Nombre <span class="required">*</span></label>
                                    <div class="inputs">
                                      <?php
if(isset($matricula)){
   echo "<label>$row1->nombre</label>";
}else{
   echo "<input class='aweform form-control' type='text' id='nombre_tutor' name='nombre_tutor' data-validate='validate(required, rangelength(1,25))'/>";
}
                     ?>                   
                                    </div>  
                                 </div>
                                 <div class="field">
                                    <label for="a_paterno_tutor">Apellido Paterno <span class="required">*</span></label>
                                    <div class="inputs">
                                      <?php
if(isset($matricula)){
   echo "<label>$row1->a_paterno</label>";
}else{
   echo "<input class='aweform form-control' type='text' id='a_paterno_tutor' name='a_paterno_tutor' data-validate='validate(required, rangelength(1,25))'/>";
}
                     ?>     
                                                       
                                    </div>  
                                 </div>
                                 <div class="field">
                                    <label for="a_materno_tutor">Apellido Materno <span class="required">*</span></label>
                                    <div class="inputs">
                                      <?php
if(isset($matricula)){
   echo "<label>$row1->a_materno</label>";
}else{
   echo "<input class='aweform form-control' type='text' id='a_materno_tutor' name='a_materno_tutor' data-validate='validate(required, rangelength(1,25))'/>";
}
                     ?>
                                                       
                                    </div>  
                                 </div>
                                 <div class="field">
                                    <label for="email_tutor">E-mail<span class="required">*</span></label>
                                    <div class="inputs">
                                      <?php
if(isset($matricula)){
   echo "<label>$row1->email</label>";
}else{
   echo "<input class='aweform form-control' type='email' id='email_tutor' name='email_tutor' data-validate='validate(required, email)'/>";
}
                     ?>
                                       
                                    </div>  
                                 </div>

                                 <div class="field">
                                    <label for="telefono_tutor">Telefono <span class="required">*</span></label>
                                    <div class="inputs">
                                       <?php
if(isset($matricula)){
   echo "<label>$row1->telefono</label>";
}else{
   echo "<input class='aweform form-control' type='tel' id='telefono_tutor' name='telefono_tutor' data-validate='validate(required, number, rangelength(1,10))'/>";
}
                     ?>                                         
                                 </div>
                                 <div class="form-submit">
                                   <?php
if(isset($matricula)){
   echo "<button type='submit' id='submit' class='btn btn-primary btn-sm' name='submit'>Imprimir</button>";
}else{
   echo "<button type='submit' id='submit' class='btn btn-primary btn-sm' name='submit'>Enviar</button>";
}
                     ?>         
                                 
                                    
                                     <a href="index.php" type="button" class="btn btn-primary btn-sm">Cancelar</a> 
                                 </div>

                              </form>

                           </div>

                        </div>

                     </div>
                     
                  </div>
                  <!-- end main -->

               </div>

            </div>
         </div>
         <!-- end block -->  	

      </div>
      <!-- end content -->

      <!-- FOOTER -->
      <footer>
         <div class="footer-top">
            <div class="container">
               <div class="row">
                  <div class="col-md-8">
                     <h3>Teresa Martin</h3>
                     <p>Educando a la niñez, adolescencia y juventud en el dinamismo de la ciencia y valores de vida, el cultivo de su interioridad que fortalece el espíritu y dispone para el compromiso y responsabilidad consigo mismos, la familia, la saciedad y la patria.
                     </p>
                     <p class="copyright">&copy; 2014 Derechos Reservados para Teresa Martin</p>


                  </div>
                  <div class="col-md-4">
                     <h3>Contacto Acámbaro</h3>

                     <p>1 de Mayo # 123</p>
                     <p>Col. Centro</p>
                     <p>Tel. 123 456 7890</p>

                     <ul class="get-social">
                        <li>
                           <a href="#">
                              <i class="fa fa-facebook"></i>
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <i class="fa fa-twitter"></i>
                           </a>
                        </li>

                        <li>
                           <a href="#">
                              <i class="fa fa-linkedin"></i>
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <i class="fa fa-google-plus"></i>
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <i class="fa fa-pinterest"></i>
                           </a>
                        </li>

                     </ul>



                  </div>


               </div>
            </div>
         </div>

      </footer>


      <!-- JavaScript
================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="js/jquery-1.11.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>

      <script src="js/jquery.dlmenu.js"></script>

      <script type="text/javascript" src="js/jquery.flexisel.js"></script>

      <script src="js/jquery.prettyPhoto.js"></script>	

      <script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
      <script type="text/javascript" src="js/jquery.easing.1.3.js"></script> 
      <script type="text/javascript" src="js/camera.min.js"></script> 	

      <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
      <script src="js/jquery.gmap.min.js"></script>

      <!--script type="text/javascript" src="js/jquery.ajax-contact-form.js"></script-->	

      <script src="js/script.js"></script>
      
      <script src="js/ketchup/jquery.js"></script>
    <script src="js/ketchup/jquery.ketchup.js"></script>
    <script src="js/ketchup/jquery.ketchup.validations.js"></script>
    <script src="js/ketchup/jquery.ketchup.helpers.js"></script>
    <script src="js/ketchup/jconfirmaction.jquery.js"></script>
    
<script> 
      $(document).ready(function(){
          
		  $('.valialum').ketchup();
		  
      });
  </script>

   </body>
</html>