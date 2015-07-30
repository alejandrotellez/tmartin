<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="shortcut icon" href="../assets/img/ico/favicon.png">

      <title>Teresa Martin</title>

      <!-- Bootstrap core CSS -->
      <link type="text/css" href="../assets/css/bootstrap2.css" rel="stylesheet">

      <!-- Custom styles for this template -->
      <link type="text/css" href="../assets/css/stylepublic.css" rel="stylesheet">

      <script type="text/jscript" src="../assets/js/modernizr.custom.js"></script>		

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
                     <a href="../index.php">Teresa Martin</a>
                  </div>
               </div>

               <!-- MENU -->
               <div class="col-md-9">
                  <div class="menu">
                     <div id="dl-menu" class="dl-menuwrapper">
                        <button class="dl-trigger">Abrir Menu</button>
                        <ul class="dl-menu">
                           <li ><a href="../index.php">Inicio</a></li>
                           <li ><a href="nosotros.php">Nosotros</a></li>
                           <li><a href="#">Servicios</a>
                              <ul class="dl-submenu">
                                 <li><a href="preescolar.php">Preescolar</a></li>
                                 <li><a href="primaria.php">Primaria</a></li>
                                 <li><a href="pastoral.php">Pastoral</a></li>
                                 <li><a href="familia.php">Familia</a></li>
                              </ul>
                           </li>
                           <li><a href="noticias.php">Noticias</a></li>
                           <li class="current"><a href="contacto.php">Contacto</a></li>
                           <?php
if(isset($_SESSION['nombre'])){
   echo "<li><a href='#'>Tareas de Administrador</a>
                              <ul class='dl-submenu'>
                                 <li><a href='../admin/index.php'>Inicio</a></li>
                                 <li><a href='../admin/Alumno/alumnos.php'>Alumnos</a></li>
                                 <li><a href='../admin/Pago/pagos.php'>Pagos</a></li>
                                 <li><a href='../admin/Reportes/reportes.php'>Reportes</a></li>
                                 <li><a href='../admin/Beca/becas.php'>Becas</a></li>
                                 <li><a href='../admin/Ciclo/ciclos.php'>Ciclos</a></li>
                                 <li><a href='../admin/Administrador/administradores.php'>Administradores</a></li>
                                 <li><a href='../admin/Configuracion/configpublic.php'>Pagina Publica</a></li>
                              </ul>
                           </li>";
}else{
   echo "<li><a href='../admin/index.php'>Administrador</a>";
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
                  <div class="col-sm-9">
                     <!-- FORMULARIO DE CONTACTO -->
                     <h2>Somos Teresa Martin</h2>
                     <span class="line" >
                        <span class="sub-line" ></span>
                     </span>
                     <p>Somos una institución que cree en la persona humana como valiosa, única y capaz de crecer, realizarse y trascender. Por lo cual, deceamos conocer lo que piensas de nosotros.</p>

                     <!--
#########################################
- Ajax Contact Form / Start -
#########################################
-->
                     <div class="ajax-contact-form">
                        <div class="form">

                           <div class="form-holder">
                              <div class="notification canhide"></div>	

                              <form id="frm_contact" name="#" action="#" method="post">

                                 <div class="field">
                                    <label for="name">Nombre o Seudonimo <span class="required">*</span></label>
                                    <div class="inputs">
                                       <input class="aweform" type="text" id="name" name="name" />
                                    </div>  
                                 </div>

                                 <div class="field">
                                    <label for="email">E-mail<span class="required">*</span></label>
                                    <div class="inputs">
                                       <input class="aweform" type="text" id="email" name="email" />
                                    </div>  
                                 </div>

                                 <div class="field">
                                    <label for="phone">Telefono <span class="required">*</span></label>
                                    <div class="inputs">
                                       <input class="aweform" type="tel" id="phone" name="phone" />
                                    </div>  
                                 </div>

                                 <div class="field">
                                    <label for="subject">Asunto</label>
                                    <div class="inputs">
                                       <select class="aweform" id="subject" name="subject">
                                          <option value="General">General</option>
                                          <option value="Administrativo">Administrativo</option>
                                          <option value="Maestros">Maestros</option>
                                       </select>
                                    </div>  
                                 </div>

                                 <div class="field">
                                    <label for="message">Mensaje <span class="required">*</span></label>
                                    <div class="inputs">
                                       <textarea class="aweform" id="message" name="message" rows="30" cols="5"></textarea>
                                    </div>  
                                 </div>						

                                 <div class="form-submit">
                                    <button type="submit" id="submit" class="btn btn-success btn-sm" name="submit">Enviar</button>   
                                 </div>

                              </form>

                           </div>

                        </div>

                     </div>
                     <!--
#########################################
- Ajax Contact Form / End -
#########################################
-->

                  </div>
                  <!-- end main -->

                  <!-- begin sidebar -->
                  <div class="col-sm-3">

                     <h3>Contacto Acámbaro</h3>
                     <span class="line" >
                        <span class="sub-line" ></span>
                     </span>

                     <ul class="about">
                        <li>
                           <i class="fa fa-map-marker"></i>
                           1 de Mayo # 123. Col. Centro
                        </li>
                        <li>
                           <i class="fa fa-mobile"></i>
                           123 456 7890
                        </li>
                        <li>
                           <i class="fa fa-envelope"></i>
                           contacto@teresamartin.com
                        </li>
                     </ul>


                  </div>
                  <!-- end sidebar -->

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
      <script type="text/javascript" src="../assets/js/jquery-1.11.1.min.js"></script>
      <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>

      <script type="text/javascript" src="../assets/js/jquery.dlmenu.js"></script>

      <script type="text/javascript" src="../assets/js/jquery.flexisel.js"></script>

      <script type="text/javascript" src="../assets/js/jquery.prettyPhoto.js"></script>	

      <!--script type="text/javascript" src="../assets/js/jquery.min.js"></script>
      <script type="text/javascript" src="../assets/js/jquery.mobile.customized.min.js"></script>
      <script type="text/javascript" src="../assets/js/jquery.easing.1.3.js"></script> 
      <script type="text/javascript" src="../assets/js/camera.min.js"></script--> 	

      <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
      <script type="text/javascript" src="../assets/js/jquery.gmap.min.js"></script>

      <script type="text/javascript" src="../assets/js/jquery.ajax-contact-form.js"></script>	

      <script type="text/javascript" src="../assets/js/script.js"></script>

   </body>
</html>