<?php

//  -------- Inicio de sesión --------
session_start();
if(!isset($_SESSION['login'])){
   header("Location: ../Administrador/login.php");
}

//  -------- Get administradores --------
$matricula = $_POST['matricula'];

if(empty($_POST['mes'])){
   header("Location: pagos.php?matricula=$matricula");
}else{
   include_once '../Clases/Alumno.php';
   $alumno = new Alumno();
   $datos = $alumno->get_alumno($matricula);
   $row = $datos->fetchObject();
   //var_dump ($row);

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
      <link type="text/css" rel="stylesheet" href="../../assets/css/bootstrap.min.css" >
      <link type="text/css" rel="stylesheet" href="../../assets/css/bootstrap-responsive.min.css">
      <!-- CSS DE PLANTILLA -->
      <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600">
      <link type="text/css" rel="stylesheet" href="../../assets/css/font-awesome2.css">
      <link type="text/css" rel="stylesheet" href="../../assets/css/style.css">
      <link type="text/css" rel="stylesheet" href="../../assets/css/pages/dashboard.css">
      <!-- CSS DE AAA Y ASOCIADOS -->
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
               <a class="brand" href="../index.html">TERESA MARTIN </a>
               <div class="nav-collapse">
                  <ul class="nav pull-right">
                     <li>
                        <a href="../../index.php" ><i class="icon-home"></i>&nbsp;Página Publicitaria<b class="caret"></b></a>
                     </li>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i>&nbsp;<?php echo $_SESSION['nombre']?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                           <li><a href="javascript:;"><i class="icon-cog"></i><span>   Configuración </span></a></li>
                           <li><a href="../Administrador/login.html"><i class="icon-off"></i><span>   Cerrar Sesion </span></a></li>
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
                  
                  <?php
   $root = "Root";
if($_SESSION['privilegios']== $root){?>
                 <li><a href="../Beca/becas.php"><i class=" icon-bookmark"></i><span>Becas</span> </a> </li>
                  <li><a href="../Ciclo/ciclos.php"><i class=" icon-refresh"></i><span>Ciclos</span> </a> </li>
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
                  <!-- ============== TABLA DE RECIBO ============== -->    
                  <div class="span12">
                     <!-- /widget -->                     
                     <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-money"></i>
                           <h3>Pago de colegiatura</h3>
                           <a href="pagos.php?matricula=<?php echo $matricula;?>" class="cerrar_frm"><i class=" icon-remove"></i></a>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">

                           <table class="table table-striped ">
                              <thead>
                                 <tr>
                                    <th rowspan="2" colspan="2"> <img src="../../assets/img/escudo.png" alt="escudo"> </th>
                                    <th colspan="4"> Colegio Teresa Maritn </th>
                                 </tr>
                                 <tr>
                                    <th colspan="4"> Labor, Virtus y Scientia</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr><td colspan="6">&nbsp;</td></tr>
                                 <tr>
                                    <th colspan="4">Información de Alumo</th>
                                    <th>fecha</th>
                                    <td><?php echo date("d/m/y");?></td>
                                 </tr>
                                 <tr>
                                    <th>Nombre</th>
                                    <td colspan="6"><?php echo "$row->nombre $row->a_paterno $row->a_materno"?></td>
                                    <!--th> Folio </th>
                                    <td> <?php //echo $new_folio;?> </td-->
                                 </tr>
                                 <tr>
                                    <th>Grado</th>
                                    <td><?php while ($grado2 = $grado1->fetchObject()){
                     if($row->idgrado == $grado2->idgrado)
                        echo $grado2->grado;
                  } ?></td>
                                    <th>Grupo</th>
                                    <td><?php
while ($grupo2 = $grupo1->fetchObject()){
   if($row->idgrupo == $grupo2->idgrupo)
      echo $grupo2->grupo;
}?> </td>
                                    <th>Escolaridad</th>
                                    <td><?php
while ($escolaridad2 = $escolaridad1->fetchObject()){
   if($row->idescolaridad == $escolaridad2->idescolaridad){
      echo $escolaridad2->escolaridad;}
}?></td>
                                 </tr>
                                 <tr><td colspan="6"></td></tr>
                                 <tr>
                                    <th>No.</th>
                                    <th colspan="2">Descripción</th>
                                    <th>Precio Unitario</th>
                                    <th>Beca</th>
                                    <th>Total</th>
                                 </tr>

                                 <?php
$colegiatura = 1500;
while ($becas2 = $becas1->fetchObject()){
   if($row->idbeca==$becas2->idbeca){
      $descuento1 = $becas2->descuento*$colegiatura;
      $descuento = number_format($descuento1, 2, '.', ' ');
   }         
}
$a = 0;
$subtotal = 0;
$diaactual = date("d");
$limite = 10;
$recargo= 5;
$subtotal2 = 0;
$date_m = array(

   "1" => "August",
   "2" => "August",
   "3" => "September",
   "4" => "October",
   "5" => "November",
   "6" => "December",
   "7" => "January",
   "8" => "January",
   "9" => "February",
   "10" => "March",
   "11" => "April",
   "12" => "May",
   "13" => "June"   
);
$date_m2 = array(

   "1" => "inscripcion",
   "2" => "agosto",
   "3" => "septiembre",
   "4" => "octubre",
   "5" => "noviembre",
   "6" => "diciembre",
   "7" => "reinscripcion",
   "8" => "enero",
   "9" => "febrero",
   "10" => "marzo",
   "11" => "abril",
   "12" => "mayo",
   "13" => "junio"
);



foreach($_POST['mes'] as $mes){
   $n = $a + 1;
   $a = $n;
   $total_mes = $colegiatura-$descuento;
   $total_mes1 = number_format($total_mes, 2, '.', ' ');
   $colegiatura1 = number_format($colegiatura, 2, '.', ' ');
   $recargo1 = number_format($recargo, 2, '.', ' ');
   
   echo "<tr>
            <td>
               $a
            </td>
            <td colspan='2'>
               $mes
            </td>
            <td>
               $ $colegiatura1
            </td>
            <td>
               $ $descuento
            </td>
            <td>
               $ $total_mes1
            </td>
         </tr>";

   foreach($date_m as $num_mes=>$mes_in){
      $mes_actual = date("F");
      if($mes_actual == $mes_in){
         $num_mes_in = $num_mes;
         //echo "<tr><td colspan='6'>num_mes_in $num_mes_in</td></tr>";
      }
   }

   foreach($date_m2 as $num_mes2=>$mes_es){
      if($mes == $mes_es){
         $num_mes_es = $num_mes2;
         //echo "<tr><td colspan='6'>num_mes_es $num_mes_es</td></tr>";
      }
   }

   if($num_mes_es <= $num_mes_in){
      if($num_mes_es == $num_mes_in or 1<2 or 7<8){
         if($diaactual > $limite){
            $n = $a + 1;
            $a = $n;
            $recargos = ($diaactual-$limite)*$recargo;
            $total_recargo = number_format($recargos, 2, '.', ' ');
            echo "<tr>
            <td>
               $a
            </td>
            <td colspan='2'>
               Recargos de $mes
            </td>
            <td>
               $ $recargo1
            </td>
            <td>
               $ 0.00
            </td>
            <td>
               $ $total_recargo
            </td>
         </tr>";
            $subtotal2 = $subtotal + $total_recargo;
         }
      }else{
         $n = $a + 1;
         $a = $n;
         $recargos = 30 *$recargo;
         $total_recargo = number_format($recargos, 2, '.', ' ');
         echo "<tr>
            <td>
               $a
            </td>
            <td colspan='2'>
               Recargos de $mes
            </td>
            <td>
               $ $recargo1
            </td>
            <td>
               $ 0.00
            </td>
            <td>
               $ $total_recargo
            </td>
         </tr>";
         $subtotal2 = $subtotal + $total_recargo;
      }
   }



   $subtotal1 = $subtotal + $total_mes1 + $subtotal2;
   $subtotal = $subtotal1;   

};



                                 ?>
                                 <tr>
                                    <th colspan="4">&nbsp;</th>
                                    <th>Total</th>
                                    <th><?php 
$subtotal1 = number_format($subtotal, 2, '.', ' ');
echo "$ $subtotal1";?></th>
                                 </tr>

                              </tbody>
                              <tfooter>
                                 <tr><td colspan="6">&nbsp;</td></tr>
                                 <tr>
                                    <td colspan="6"> Colegio Teresa Martin 1 de Mayo # 123 Col. Centro Tel. 123 456 7890</td>
                                 </tr>
                              </tfooter>
                           </table>
                           <form action="agregar_pago.php" method="post">
                              <input type="hidden" name="matricula" value="<?php echo $_POST['matricula'];?>">
                              <?php
foreach($_POST['mes'] as $mes){
   echo "<input type='hidden' name='mes[]' value='$mes'>";
}?>                              
                              <input type="submit" value="pagar">
                           </form>

                        </div>
                        <!-- /widget-content --> 
                     </div>
                     <!-- /widget --> 
                  </div>
                  <!-- /span12 -->

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
                        <li><a href="../index.php"> Inicio </a></li>
                        <li><a href="../Alumno/alumnos.php"> Alumnos </a></li>
                        <li><a href="../Pago/pagos.php"> Pagos </a></li>
                        <li><a href="../Reportes/reportes.php"> Reportes </a></li>
                        <li><a href="becas.php"> Becas </a></li>
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
                        <li><i class=" icon-twitter"></i>&nbsp;<i class="icon-facebook"></i>&nbsp;<i class="icon-youtube"></i>&nbsp;<span> /teresamartin</span></li>
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
      <script src="../../assets/js/jquery-1.7.2.min.js"></script> 
      <!--script src="js/excanvas.min.js"></script> 
<script src="js/chart.min.js" type="text/javascript"></script--> 
      <script src="../../assets/js/bootstrap.js"></script>
      <!--script src="js/base.js"></script-->

   </body>
</html>

