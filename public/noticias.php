<?php
session_start();

//  -------- Get Noticias --------
include_once '../admin/Clases/Noticia.php';
$noticias = new Noticia();
$datos1 = $noticias->get_noticia(null);

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="shortcut icon" href="../assets/img/ico/favicon.png">

      <title>Yellow!</title>

      <!-- Bootstrap core CSS -->
      <link href="../assets/css/bootstrap2.css" rel="stylesheet">

      <!-- Custom styles for this template -->
      <link href="../assets/css/stylepublic.css" rel="stylesheet">
      
      <!---------- Style de AAA y Asociados ---------->
      <link href="../assets/css/styleAAA.css" rel="stylesheet">

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
                           <li ><a href="nosotros.php">Nosotros</a></li>
                           <li><a href="#">Servicios</a>
                              <ul class="dl-submenu">
                                 <li><a href="preescolar.php">Preescolar</a></li>
                                 <li><a href="primaria.php">Primaria</a></li>
                                 <li><a href="pastoral.php">Pastoral</a></li>
                                 <li><a href="familia.php">Familia</a></li>
                              </ul>
                           </li>
                           <li class="current"><a href="noticias.php">Noticias</a></li>
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

         <!-- start page_title -->
         <img src="images/page_banner_blog.jpg" alt="" />
         <!-- end page_title --> 

      </div>

      <!-- start content -->
      <div class="content">

         <!-- start block -->		
         <div class="block">
            <div class="container">

               <div class="row">

                  <div class="col-sm-9">
                     <h2 class="headers">Noticias</h2>
                     <span class="line" >
                        <span class="sub-line" ></span>
                     </span>

                     <!-- NOTICIAS -->
<?php
while ($row1 = $datos1->fetchObject()){
                                 ?>
                     <!-- POST 1 -->
                     <div class="post-preview">
                        <!-- Post Title & Meta -->
                        <h3><a href="#" class="dark-link"><?php echo $row1->titulo;?></a></h3>
                        <div class="post-meta">							 
                           <span class="meta-date"><?php echo $row1->fecha;?></span>
                           <span class="meta-tags"><a href="#"><?php echo $row1->autor;?></a></span>
                        </div>
                        <!-- End Post Title & Meta -->
                        <!-- Imagen del Post -->
                        <div class="post-image-wrap">
                           <img src="<?php echo $row1->urlimagen;?>" alt="" class="imagen_noticia">
                        </div><br/>
                        <!-- End Post Image -->
                        <p>
                           <?php echo $row1->descripcion;?>
                        </p>
                     </div>
                     <!-- End Post 1 -->
                     
                      <?php
}
                                 ?>               
                    
                     <!-- Pagination -->
                     <!--div class="pagination">
                        <div>
                           Page 1 of 7
                        </div>
                        <a href="#" >1</a>
                        <a href="#" class="active">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>

                        <a href="#">5</a>
                        <a href="#">6</a>
                        <a href="#">7</a>
                     </div-->
                     <!-- End Pagination -->
                  </div>                 

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

      <script src="js/jquery.dlmenu.js" type="text/javascript"></script>
      <script src="js/jquery.flexisel.js" type="text/javascript"></script>
      <script src="js/jquery.prettyPhoto.js" type="text/javascript"></script>	

      <!--script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
      <script type="text/javascript" src="js/jquery.easing.1.3.js"></script> 
      <script type="text/javascript" src="js/camera.min.js"></script--> 	

      <script src="http://maps.googleapis.com/maps/api/js?sensor=true" type="text/javascript"></script>
      <script src="js/jquery.gmap.min.js" type="text/javascript"></script>

      <script src="js/jquery.ajax-contact-form.js" type="text/javascript"></script>	

      <script src="js/script.js" type="text/javascript"></script>

   </body>
</html>