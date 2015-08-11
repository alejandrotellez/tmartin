<?php

// -------- Inicio y destrucción de sesión --------
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="es">

   <head>
      <meta charset="utf-8">
      <title>Iniciar Sesión</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <meta name="apple-mobile-web-app-capable" content="yes"> 
      <link rel="shortcut icon" href="../../assets/img/ico/favicon.png">


      <link type="text/css" rel="stylesheet" href="../../assets/css/bootstrap.min.css">
      <link type="text/css" rel="stylesheet" href="../../assets/css/bootstrap-responsive.min.css">

      <link type="text/css" rel="stylesheet" href="../../assets/css/font-awesome.css">
      <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600">

      <link type="text/css" rel="stylesheet" href="../../assets/css/style.css">
      <link type="text/css" rel="stylesheet" href="../../assets/css/pages/signin.css">

      <link type="text/css" rel="stylesheet" href="../../assets/css/styleAAA.css">

      <!-- KETCHUP-->
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
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
               </a>			
               <a class="brand" href="../../index.php">Teresa Martin</a>
               <div class="nav-collapse">
                  <ul class="nav pull-right">
                     <li class="">						
                        <a href="#" class=""> Has olvidado tu contraseña</a>						
                     </li>					
                     <li class="">						
                        <a href="../../index.php" class=""><i class="icon-chevron-left"></i> Regresar a pagina principal</a>				
                     </li>
                  </ul>				
               </div><!--/.nav-collapse -->		
            </div> <!-- /container -->		
         </div> <!-- /navbar-inner -->	
      </div> <!-- /navbar -->

      <!-- ==================================================
CONTENIDOS 
=================================================== -->

      <div class="account-container">	
         <div class="content clearfix">	

            <!-- ============== FORMULARIO DE LOGIN ============== -->
            <form action="validar.php" method="post" class="valilogin">		
               <h1>Iniciar Sesión  </h1>
               <?php
if(isset($_GET['error'])){
   $msn = $_GET['message'];
   echo "<p class='text-danger'>$msn</p>";
}
               ?>

               <!-- ============== MENSAJES DE AVISO ============== -->
              					
               <div class="login-fields">						
                  <div class="input-group field">
                     <span class="input-group-addon mitooltip" title="Ingresa la matricula de Alumno" data-placement="top">
                        <label for="matricula">Matricula de Administrador</label>
                     </span>

                     <input type="text" id="matricula" name="matricula" value="" placeholder="Matricula de Administrador" class="login username-field form-control" data-validate="validate(required, rangelength(1,25))" />
                  </div> <!-- /field de matricula-->

                  <div class="field">
                     <label for="password">Password</label>
                     <input type="password" id="password" name="password" value="" placeholder="Contraseña" class="login password-field form-control" data-validate="validate(required, rangelength(1,10))"/>
                  </div> <!-- /field de contraseña password -->

               </div> <!-- /login-fields -->

               <div class="login-actions">								
                  <button class="button btn btn-success btn-large">Iniciar Sesión</button>				
               </div> <!-- .actions -->
            </form> <!-- /form -->		
         </div> <!-- /content clearfix -->	
      </div> <!-- /account-container -->

      <!-- JavaScript y JQuery de Bootstrap -->
      <script type="text/jscript" src="../../assets/js/jquery-1.7.2.min.js"></script>
      <script type="text/jscript" src="../../assets/js/bootstrap.js"></script>

      <script type="text/jscript" src="../../assets/js/signin.js"></script>


      <script type="text/jscript" src="../../assets/js/ketchup/jquery.js"></script>
      <script type="text/jscript" src="../../assets/js/ketchup/jquery.ketchup.js"></script>
      <script type="text/jscript" src="../../assets/js/ketchup/jquery.ketchup.validations.js"></script>
      <script type="text/jscript" src="../../assets/js/ketchup/jquery.ketchup.helpers.js"></script>
      <script type="text/jscript" src="../../assets/js/ketchup/jconfirmaction.jquery.js"></script>

      <script>
         $('.mitooltip').tooltip();
         
         $('#paso-2').modal({
               show: true
            })

         $(document).ready(function(){

            $('.valilogin').ketchup();

         });
      </script>

   </body>

</html>
