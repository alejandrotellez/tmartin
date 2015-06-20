<?php

   // -------- Inicio y destrucción de sesión --------
    session_start();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Iniciar Sesión</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/pages/signin.css" rel="stylesheet" type="text/css">

<link href="css/styleAAA.css" rel="stylesheet">

<!-- KETCHUP-->
    <link href="css/ketchup/jquery.ketchup.css" rel="stylesheet">
    <link href="css/ketchup/jcomfirmaction.css" rel="stylesheet">

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
			<a class="brand" href="index.html">Teresa Martin</a>
			<div class="nav-collapse">
				<ul class="nav pull-right">
					<li class="">						
						<a href="#" class=""> Has olvidado tu contraseña</a>						
					</li>					
					<li class="">						
						<a href="#" class=""><i class="icon-chevron-left"></i> Regresar a pagina principal</a>				
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
		<form action="validar.php" method="post" class="valilogin">		
			<h1>Iniciar Sesión</h1>					
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
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>

<script src="js/signin.js"></script>


    <script src="js/ketchup/jquery.js"></script>
    <script src="js/ketchup/jquery.ketchup.js"></script>
    <script src="js/ketchup/jquery.ketchup.validations.js"></script>
    <script src="js/ketchup/jquery.ketchup.helpers.js"></script>
    <script src="js/ketchup/jconfirmaction.jquery.js"></script>

<script>
   $('.mitooltip').tooltip();
   
   $(document).ready(function(){
          
		  $('.valilogin').ketchup();
		  
      });
   </script>

</body>

</html>
