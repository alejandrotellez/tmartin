<?php
session_start();

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="AAA-Asociados">
    <link rel="shortcut icon" href="../assets/img/ico/favicon.png">

    <title>Teresa Martin</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap2.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/stylepublic.css" rel="stylesheet">
	
	<script src="../assets/js/modernizr.custom.js"></script>		

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
                           <li class="current"><a href="nosotros.php">Nosotros</a></li>
                           <li><a href="#">Servicios</a>
                              <ul class="dl-submenu">
                                 <li><a href="preescolar.php">Preescolar</a></li>
                                 <li><a href="primaria.php">Primaria</a></li>
                                 <li><a href="pastoral.php">Pastoral</a></li>
                                 <li><a href="familia.php">Familia</a></li>
                              </ul>
                           </li>
                           <li><a href="noticias.php">Noticias</a></li>
                           <li><a href="contacto.php">Contacto</a></li>
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
  
  <div class="page_banner">

  <!-- IMAGEN DE INICIO start page_title -->
    <img src="images/page_banner_about.jpg" alt="" />
  <!-- end page_title --> 
  
  </div>
	
  <!-- start content -->
  <div class="content">
	
  <!-- start block -->		
  <div class="block">
    <div class="container">
	
      <!-- BLOCK SOBRE NOSOTROS -->
	      <h2 class="headline">Nosotros</h2>
          <span class="line">
            <span class="sub-line"></span>
          </span>
		
	  <div class="row">
	  
	    <div class="col-md-6">
          <h3>Creemos en la persona humana como valiosa, única y capaz de crecer, realizarse y trascender.</h3><br>
          <p>De esta inspiración misionera de la Congregación, surge el Colegio Teresa Martin de Cuautla Morelos. </p><p>
   Es el año 1942, en el centro de la ciudad de Cuautla, en el Estado de Morelos nace el Colegio Teresa Martin como una institución educativa para la niñez, adolescencia y juventud morelenses, con trascendencia a la familia de los alumnos. </p><p>
   El Colegio Teresa Martín es de Inspiración cristiana católica como expresión del Carisma de la Congregación de Carmelitas Misioneras de Santa Teresa ( CMST). </p><p>
EL Colegio Teresa Martin es el primero y más antiguo colegio de religiosas fundado en la Ciudad de Cuautla. Se abrieron las inscripciones para primaria el día 12 de enero de 1942 y en 1956 se funda la Escuela Normal Primaria y para Educadoras, siendo las directoras la Hna. Ediht Ayala Mondragón, la Hna. Pilar Rojas y como director técnico el Profr. Heriberto Valdespín de la Sancha. </p><p>
En 1963 se obtiene la incorporación de la secundaria por la SEP bajo el Acuerdo 15937. El 19 de agosto de 1987 se fundó la preparatoria, incorporada a la Universidad Autónoma del Estado de Morelos (UAEM) siendo la directora técnica la Lic. Ma. Del Pilar Tielve Campillo. Todas las secciones del Colelgio desde el inicio fueron mixtas.</p>
         
		</div>
		
	    <div class="col-md-6">
          <img class="gym-club" alt="img" src="../assets/img/eventos/evento2.jpg">		
		</div>
	
	  </div>
	  
	  <!-- TABS DE FILOSOFIA EMPRESARIAL -->	  
	  <div class="row" style="margin-top:36px;">

                    <!-- -->
                    <div class="col-md-12" >
                        <!-- TABS -->
                        <ul class="nav nav-tabs nav-tabs-sec">
                          <li class="active">
                            <a href="#mision" data-toggle="tab">Misión</a>
                          </li>
                          <li><a href="#vision" data-toggle="tab" >Visión</a></li>
                          <li><a href="#credo" data-toggle="tab" >Credo</a></li>
                          <li><a href="#filosofia" data-toggle="tab" >Filosofía</a></li>
                        </ul>
                         
                        <div class="tab-content nav-tabs-sec">
                          <div class="tab-pane active" id="mision">
                            <p>
                                 Educar a niñez, adolescencia y juventud en el dinamismo de la ciencia y valores de vida, el cultivo de su interioridad que fortalece el espíritu y dispone para el compromiso y responsabilidad consigo mismos, la familia, la saciedad y la patria.
                            </p>
                            
                          </div>
                          <div class="tab-pane" id="vision">
                            <p>
                                 El Colegio Teresa Martín, para el 2017 seguirá con su prestigio de calidad y calidez humana, Acreditación por la SEP como escuela de calidad, libre de violencia, formación humana católica significativa, alto nivel académico y de idiomas: inglés y francés. 
                            </p>
                            
                          </div>
                          <div class="tab-pane" id="credo">
                            <p>
                                 Creemos en la persona humana como valiosa, única y capaz de crecer, realizarse y trascender. </p><p>


Reconocemos al educando como "hijo de Dios", con capacidades para el estudio en todas sus dimensiones, para crear amistad mediante la comunión con Dios como Padre y con los demás como hermanos y amigos y para el servicio a la comunidad a la Patria y a Dios. </p><p>

Creemos con Edith Estein ( filósofa, carmelita de ascendencia alemana ) que el trabajo integro de la educación brota, del amor, y que el medio más eficaz es el testimonio de quien acompaña este proceso. </p><p>

Creemos en el Testimonio Evangelizador de nuestra Comunidad Religiosa de CMST, por eso nos esforzamos en construir todos los días una comunidad de vida, de fe y de esperanza para nuestra querida Familia Teresa Martín. </p><p>

Los principios de formación humana para nuestro alumnado se fundamentan en la persona de Jesús y su Evangelio, en María de Nazareth, en el Magisterio Eclesial, en la espiritualidad de Teresa de Ávila, Juan de la Cruz y Teresa de Lisieux, por su trascendencia al mundo, coherencia de vida y su espíritu abierto a la ciencia, al arte, a la cultura que traspasa tiempo y espacio y que se mantiene vivo y operante para el siglo XXI en que vivimos hoy.
                            </p>
                            
                          </div>
                          <div class="tab-pane" id="filosofia">
                            <p>
                                 Razón de ser de las Carmelitas Misioneras de Santa Teresa del CTM</p><p>

Para las Carmelitas Misioneras de Santa Teresa del CTM, la educación integral católica que continúa la misión de Cristo Maestro, es una plena expresión de nuestro compromiso evangelizador. Esta vocación al magisterio nos ha sido dada para el servicio de nuestros hermanos desde los inicios de La Congregación.</p><p>

Es María, maestra de vida, la que anima nuestro caminar para acompañar el proceso individual con respeto, alegría y sencillez. Es Ella la que inspira en nosotros el gesto amable, la palabra oportuna, la acción que brota del corazón en el trato con los niños, jóvenes y adultos, a cultivar en los educandos la sensibilidad a la presencia de Dios, a la oración silenciosa y contemplativa como apertura del corazón hacia El que es nuestro Padre.</p><p>

El quehacer educativo de la carmelita misionera de Santa Teresa, se propone ante todo, promover una educación integral en todos los educandos y lograr en ellos una personalidad bien definida, fuerte, equilibrada, en proceso de crecimiento y búsqueda constante de autenticidad.
                            </p>
                            
                          </div>
                        </div>
                    </div>
                    
  
	  </div>
	  
	</div>
  </div>
  <!-- end block -->  	
  
  <!-- BLOCK DE RECONOCIMIENTOS>
  <div class="block">
    <div class="container">
	
	      <h2 class="headline">Reconocimientos/Alianzas</h2>
          <span class="line">
            <span class="sub-line"></span>
          </span>	

                <ul id="clients"> 
				  <li><img src="../assets/img/alianzas/alianza1.png" alt="" width="200" ></li>
                  <li><img src="../assets/img/alianzas/alianza2.png" alt="" width="200"></li>
                  <li><img src="../assets/img/alianzas/alianza3.png" alt="" width="200"></li>
                  <li><img src="../assets/img/alianzas/alianza4.png" alt="" width="200"></li>
                  <li><img src="../assets/img/alianzas/alianza1.png" alt="" width="200" ></li>
                  <li><img src="../assets/img/alianzas/alianza2.png" alt="" width="200"></li>
                  <li><img src="../assets/img/alianzas/alianza3.png" alt="" width="200"></li>
                  <li><img src="../assets/img/alianzas/alianza4.png" alt="" width="200"></li>
				</ul>
		  
	</div>
  </div -->
	
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
    <script src="../assets/js/jquery-1.11.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
	
	<script src="../assets/js/jquery.dlmenu.js"></script>
	
    <script type="text/javascript" src="../assets/js/jquery.flexisel.js"></script>

	<script src="../assets/js/jquery.prettyPhoto.js"></script>	

    <!--script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.mobile.customized.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.easing.1.3.js"></script> 
    <script type="text/javascript" src="../assets/js/camera.min.js"></script> 	
    <script type="text/javascript" src="assets/js/script.js"></script-->
	
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
	<script src="../assets/js/jquery.gmap.min.js"></script>
	
	<script type="text/javascript" src="../assets/js/jquery.ajax-contact-form.js"></script>	

    
	
  </body>
</html>
