<?php
session_start();

//  -------- Get Slider --------
include_once 'admin/Clases/Slider.php';
$slide = new Slider();
$datos = $slide->get_slider(null);

?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="AAA-Asociados">
      <link rel="shortcut icon" href="assets/img/ico/favicon.png">

      <title>Teresa Martin</title>

      <!-- CSS DE BOOTSTRAP -->
      <link href="assets/css/bootstrap2.css" rel="stylesheet">
      <!-- CSS DE LA PLANTILLA -->
      <link href="assets/css/stylepublic.css" rel="stylesheet">
      <link href="assets/css/jquery.bxslider.css" rel="stylesheet" type="text/css">
      
      <!-- JAVASCRIPT DE PLANTILLA -->
      <script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
      <script src="assets/js/jquery.bxslider.js" type="text/javascript"></script>
      <script src="assets/js/modernizr.custom.js"></script>
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
                           <li class="current"><a href="index.php">Inicio</a></li>
                           <li><a href="public/nosotros.php">Nosotros</a></li>
                           <li><a href="#">Servicios</a>
                              <ul class="dl-submenu">
                                 <li><a href="public/preescolar.php">Preescolar</a></li>
                                 <li><a href="public/primaria.php">Primaria</a></li>
                                 <li><a href="public/pastoral.php">Pastoral</a></li>
                                 <li><a href="public/familia.php">Familia</a></li>
                              </ul>
                           </li>
                           <li><a href="public/noticias.php">Noticias</a></li>
                           <li><a href="public/contacto.php">Contacto</a></li>
                           
                           <?php
if(isset($_SESSION['nombre'])){
   echo "<li><a href='#'>Tareas de Administrador</a>
                              <ul class='dl-submenu'>
                                 <li><a href='admin/index.php'>Inicio</a></li>
                                 <li><a href='admin/Alumno/alumnos.php'>Alumnos</a></li>
                                 <li><a href='admin/Pago/pagos.php'>Pagos</a></li>
                                 <li><a href='admin/Reportes/reportes.php'>Reportes</a></li>";
   $root = "Root";
   if($_SESSION['privilegios']== $root){
   echo "
                                 <li><a href='admin/Beca/becas.php'>Becas</a></li>
                                 <li><a href='admin/Ciclo/ciclos.php'>Ciclos</a></li>
                                 <li><a href='admin/Administrador/administradores.php'>Administradores</a></li>";}
   echo "
                                 <li><a href='admin/Configuracion/configpublic.php'>Pagina Publica</a></li>
                              </ul>
                           </li>";
}else{
   echo "<li><a href='admin/index.php'>Administrador</a></li>";
}
?>
                                                  
                        </ul>
                     </div> 
                  </div><!-- /.menu --> 
               </div>

            </div>

         </div>
      </header>	

      <!-- SLIDER CON AYUDA DE PLUGGIN DE JAVASCRIPT -->
      <div class="slider">
         <ul class="bxslider" id="slider">
           <?php
while ($row = $datos->fetchObject()){
                                 ?>
            <li>
               <img src="<?php echo $row->url;?>" /></li>
<?php
}
                                 ?> 
         </ul>
      </div>
      <!-- end slider -->

      <!-- start content -->
      <div class="content">

         <!-- PROMOBOX FRASE PROMOCIONAL PRINCIPAL -->		
         <div class="promobox text-center">
            <div class="container">
               <h1>“ Vivir la experiencia de Dios y ayudar a que otros la vivan, preferentemente entre los pobres ”</h1>
               <a href="public/solicitud_alumno.php" class="btn btn-transparent"> Inscribirme </a>
            </div>
         </div>
         <!-- end promobox -->	

         <!-- BLOCK DE IMAGENES DE NOTICIAS -->		
         <div class="block">
            <div class="container">

               <div class="row">

                  <div class="col-md-12">

                     <h2 class="headline">Eventos Recientes</h2>
                     <span class="line">
                        <span class="sub-line"></span>
                     </span>

                     <ul id="recent-works">
                        <li>
                           <img class="img-responsive" alt="image" src="assets/img/eventos/evento1.jpg">
                           <h3>
                              <small>
                                 <a href="#">Preescolar Inicia</a>
                              </small>
                           </h3>
                        </li>

                        <li>
                           <img class="img-responsive" alt="image" src="assets/img/eventos/evento2.jpg">
                           <h3>
                              <small>
                                 <a href="#">Dia del Niño</a>
                              </small>
                           </h3>
                        </li>

                        <li>
                           <img class="img-responsive" alt="image" src="assets/img/eventos/evento3.jpg">
                           <h3>
                              <small>
                                 <a href="#">Ensaño del Desfile</a>
                              </small>
                           </h3>
                        </li>

                        <li>
                           <img class="img-responsive" alt="image" src="assets/img/eventos/evento4.jpg">
                           <h3>
                              <small>
                                 <a href="#">Mini-olimpiadas 2015</a>
                              </small>
                           </h3>
                        </li>	 

                        <li>
                           <img class="img-responsive" alt="image" src="assets/img/eventos/evento5.jpg">
                           <h3>
                              <small>
                                 <a href="#">Día del Maestro</a>
                              </small>
                           </h3>
                        </li>	

                        <li>
                           <img class="img-responsive" alt="image" src="assets/img/eventos/evento6.jpg">
                           <h3>
                              <small>
                                 <a href="#">Equipos Deportivos</a>
                              </small>
                           </h3>
                        </li>	


                     </ul>

                  </div>

               </div>

            </div>
         </div>
         <!-- end block -->  	


         <!-- BLOCK DE TEXTO CON IMAGEN -->		
         <div class="block">
            <div class="container">

               <h2 class="headline">Somos Teresa Martin</h2>
               <span class="line">
                  <span class="sub-line"></span>
               </span>

               <div class="row">

                  <div class="col-md-12">

                     <h3>Teresa Martin. Labor, Virtus y Scientia </h3>
                     <br /><br />
                     <p><img class="pull-left" alt="img" src="assets/img/tm-about.jpg" width="450" style="padding:0 20px 20px 0;">	
                        El Colegio Teresa Martin es un colegio fundado por las CARMELITAS MISIONERAS DE SANTA TERESA (CMST).

                        Las CMST somos una Congregación fundada en la Ciudad de México el 8 de marzo de 1903 por cuatro religiosas mexicanas, con un CARISMA y peculiar estilo de vida religiosa que acentúa el aspecto contemplativo como fuente de servicio al pueblo de Dios. </p>

                     <p>EN 1942 FUNDAMOS EL COLEGIO TERESA MARTÍN.</p>

                     <p>Como Carmelitas misioneras de Santa Teresa tenemos la Misión de: “vivir la experiencia de Dios y ayudar a que otros la vivan, preferentemente entre los pobres.”</p>

                     <p>Sembrar en el corazón del niño, adolescente y joven, semillas de verdad, sacar de ellos y ellas todo el valioso potencial que poseen y orientarles para su crecimiento y trascendencia hacia la construcción de una sociedad de bien.</p>

                     <p>Padres de familia, si ustedes desean una formación sólida, fundamentada en valores ético-sociales y calidad académica para sus hijos e hijas, aquí en el Colegio Teresa Martin está su lugar, aquí son siempre bienvenidas y bienvenidos.
                     </p>


                  </div>

                  <div class="col-md-6">

                  </div>

               </div>



            </div>
         </div>
         <!-- end block -->  


         <!-- BLOCK DE SERVICIOS -->	
         <div class="block">

            <div class="container">

               <div class="row">

                  <div class="col-md-12">
                     <h2 class="headers">Servicios</h2>
                     <span class="line" >
                        <span class="sub-line" ></span>
                     </span>

                     <div class="row">

                        <div class="col-md-4">
                           <ul class="nav nav-pills nav-stacked services">
                              <li class="active"><a href="#tab_a" data-toggle="pill"><i class="fa fa-male"></i>Preescolar</a></li>
                              <li><a href="#tab_b" data-toggle="pill"><i class="fa fa-user"></i>Primaria</a></li>
                              <li><a href="#tab_c" data-toggle="pill"><i class="fa fa-heart"></i>Pastoral</a></li>
                              <li><a class="last" href="#tab_d" data-toggle="pill"><i class="fa fa-users"></i>Familia</a></li>
                           </ul>
                        </div>

                        <div class="tab-content col-md-8">
                           <div class="tab-pane active" id="tab_a">
                              <h4>Preescolar</h4>
                              <img src="assets/img/servicios/servicio1.jpg" style="margin:15px 0;" alt="" />
                              <p>Formando en los pequeños, hábitos fundamentales que más tarde se convertirán en actitudes de vida: atención, ejecución de indicaciones, escucha; se despierta la capacidad innata hacia la sorpresa y de admiración mediante el contacto físico con la naturaleza. <a href="public/preescolar.php">Ver más</a></p>
                           </div>
                           <div class="tab-pane" id="tab_b">
                              <h4>Primaria</h4>
                              <img src="assets/img/servicios/servicio2.jpg" style="margin:15px 0;" alt="" />
                              <p>La etapa más intensa de formación de hábitos y valores como fuerza que sustenta aprendizajes fundamentales como son la conciencia del trabajo bien hecho y el cumplimiento del deber.<a href="public/primaria.php">Ver más</a></p>
                           </div>
                           <div class="tab-pane" id="tab_c">
                              <h4>Pastoral</h4>
                              <img src="assets/img/servicios/servicio3.jpg" style="margin:15px 0;" alt="" />
                              <p> La educación del Colegio Teresa Martin se caracteriza por su enfoque católico y se fundamenta en la Sagrada Escritura y espiritualidad del Carmelo Teresiano.<a href="public/pastoral.php">Ver más</a></p>
                           </div>
                           <div class="tab-pane" id="tab_d">
                              <h4>Familia</h4>
                              <img src="assets/img/servicios/servicio4.jpg" style="margin:15px 0;" alt="" />
                              <p>La familia, es la primera responsable de la educación y el Colegio, su colaborador cercano y solidario.<a href="public/familia.php">Ver más</a></p>
                           </div>

                        </div><!-- tab content -->

                     </div>

                  </div>					



               </div>  

            </div>

         </div>
         <!-- end block -->

         <!-- BLOCK DE RECONOCIMIENTOS -->
         <div class="block">
            <div class="container">

               <h2 class="headline">Reconocimientos/Alianzas</h2>
               <span class="line">
                  <span class="sub-line"></span>
               </span>	

               <ul id="clients"> 
                  <li><img src="assets/img/alianzas/alianza1.png" alt="" width="200" ></li>
                  <li><img src="assets/img/alianzas/alianza2.png" alt="" width="200"></li>
                  <li><img src="assets/img/alianzas/alianza3.png" alt="" width="200"></li>
                  <li><img src="assets/img/alianzas/alianza4.png" alt="" width="200"></li>
                  <li><img src="assets/img/alianzas/alianza1.png" alt="" width="200" ></li>
                  <li><img src="assets/img/alianzas/alianza2.png" alt="" width="200"></li>
                  <li><img src="assets/img/alianzas/alianza3.png" alt="" width="200"></li>
                  <li><img src="assets/img/alianzas/alianza4.png" alt="" width="200"></li>
               </ul>

            </div>
         </div>

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

      <!-- JAVASCRIP DE BOOTSTRAPT -->
      <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

      <!-- JAVASCRIP DE PLANTILLA -->
      <script type="text/javascript" src="assets/js/jquery.dlmenu.js"></script>
      <script type="text/javascript" src="assets/js/jquery.flexisel.js"></script>
      <script type="text/javascript" src="assets/js/jquery.prettyPhoto.js"></script>
      <script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
      <script type="text/javascript" src="assets/js/jquery.ajax-contact-form.js"></script>
      <script type="text/javascript" src="assets/js/script.js"></script>

   </body>
</html>
