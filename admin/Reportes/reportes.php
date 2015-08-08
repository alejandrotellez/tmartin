<?php

//  -------- Inicio de sesión --------
session_start();
if(!isset($_SESSION['login'])){
   header("Location: login.php");
}

include_once '../Clases/Alumno.php';
$alumno = new Alumno();

include_once '../Clases/Pago1.php';
$pago = new Pago1();
$fecha1 = date("Y-m-d", strtotime('-6 day'));
$fecha2 = date("Y-m-d", strtotime('-1 day'));
$pagos = $pago->get_reporte_pago($fecha1, $fecha2);
$d = 0;
while($pagos2 = $pagos->fetchObject()){
   $total = $pagos2->pago + $pagos2->recargos + $d;
   $d = $total;
   //echo "$pagos2->pago + $pagos2->recargos + $d  Total= $total||";
}

include_once '../Clases/Estatus.php';
$estatus = new Estatus();
$datos_estatus = $estatus->get_estatus(null, null);
$idestatus = null;
$inscritos = array();

while($row_estatus = $datos_estatus->fetchObject()){
   $idestatus = $row_estatus->idestatus;
   $alumno_report =  $alumno->get_report_status($idestatus);
   $numer[] = $alumno_report->fetch();
   $estatus2[] = $row_estatus->estatus;
}

$matricula_report =  $alumno->get_report_alumnos();
$max_matricula = $matricula_report->fetchObject();
$porcentaje_total = $max_matricula->matricula;

/*for($i=0; $i < count($numer); $i++){
   echo $numer[$i]['estatus'];
}*/

$week = array(
   "Viernes" => "Friday",
   "Jueves" => "Thursday",
   "Miercoles" => "Wednesday",
   "Martes" => "Tuesday",
   "Lunes" => "Monday",
   "Sabado" => "Saturday",
   "Domigo" => "Sunday",
);

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
      <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="../../assets/css/bootstrap-responsive.min.css" rel="stylesheet">
      <!-- CSS DE PLANTILLA -->
      <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
      <link href="../../assets/css/font-awesome2.css" rel="stylesheet">
      <link href="../../assets/css/style.css" rel="stylesheet">
      <link href="../../assets/css/pages/dashboard.css" rel="stylesheet">
      <link href="../../assets/css/reports.css" rel="stylesheet">
      <!-- CSS DE AAA Y ASOCIADOS-->
      <link type="text/css" rel="stylesheet" href="../../assets/css/styleAAA.css">


      <!---------- Style de AAA y Asociados ---------->
      <link href="../css/styleAAA.css" rel="stylesheet">

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
               <a class="brand" href="index.php">TERESA MARTIN </a>
               <div class="nav-collapse">
                  <ul class="nav pull-right">
                     <li>
                        <a href="../index.php" ><i class="icon-home"></i>&nbsp;Página Publicitaria<b class="caret"></b></a>
                     </li>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i>&nbsp;<?php echo $_SESSION['nombre'];?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                           <li><a href="javascript:;"><i class="icon-cog"></i><span>   Configuración </span></a></li>
                           <li><a href="login.php"><i class="icon-off"></i><span>   Cerrar Sesion </span></a></li>

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
                  <li><a href="../Pago/pagos.php"><i class=" icon-money"></i><span>Pagos</span> </a> </li>
                  <li class="active"><a href="reportes.php"><i class="icon-list-alt"></i><span>Reportes</span> </a> </li>
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

      <div class="container">

         <div class="row">

               <div class="span6">

                  <div class="widget">

                     <div class="widget-header">
                        <i class="icon-star"></i>
                        <h3>Inscripción de alumnos</h3>
                     </div> <!-- /widget-header -->

                     <div class="widget-content">
                        <canvas id="pie-chart" class="chart-holder" height="250" width="538"></canvas>
                        <table class="table table-striped table-bordered get_table">
                           <tr>
                              <th colspan="2">Alumnos</th>
                           </tr>
                           
                                 <?php
$c = 0;
for($i=0; $i < count($numer); $i++){
   $value = $numer[$i]['estatus'];
   $estatus3 = $estatus2[$i];
   echo "<tr>
   <td> $estatus3 </td>
   <td> $value </td>
                           </tr>";
   $c = $value + $c;
}
echo "<tr>
   <th> Total de Alumnos </th>
   <td> $c </td>
                           </tr>";
                                 ?>
                              

                        </table>
                     </div> <!-- /widget-content -->

                  </div> <!-- /widget -->




               </div> <!-- /span6 -->


               <div class="span6">

                  <div class="widget">

                     <div class="widget-header">
                        <i class="icon-list-alt"></i>
                        <h3>Pagos Semanales</h3>
                     </div> <!-- /widget-header -->

                     <div class="widget-content">
                        <canvas id="bar-chart" class="chart-holder" height="250" width="538"></canvas>
                        <br>
                        <table class="table table-striped table-bordered get_table">
                           <tr>
                              <th>Día</th>
                              <th>Fecha</th>
                              <th>Ingreso</th>
                           </tr>

                           <?php
$e = 0;
for($i=0; $i < 5; $i++){
   $numero = $i + 1;
   $resta = "- $numero day";
   $day = date("l", strtotime($resta));
   $fecha1 = date("Y-m-d", strtotime($resta));
   $pagos = $pago->get_reporte_pago($fecha1);
   $f= 0;
   while($pagos2 = $pagos->fetchObject()){
      $total1 = $pagos2->pago + $pagos2->recargos + $f;
      $f = $total1;
   }
   foreach($week as $day_es=>$day_in){
      if($day == $day_in){
         $total12 = number_format($total1, 2, '.', ' ');
         echo "<tr>
                              <td>$day_es</td>
                              <td>$fecha1</td>
                              <td>$ $total12</td>
                           </tr>";
      }
   }
   $total_final = $total + $e;
   $e = $total_final;
   $f = 0;
   $total1 = 0;
}
$e2 = number_format($e, 2, '.', ' ');
echo "<tr>
                              <th colspan='2'>Total</th>
                              <td>$ $e2</td>
                           </tr>";
                           ?>
                        </table>
                     </div> <!-- /widget-content -->

                  </div> <!-- /widget -->

               </div> <!-- /span6 -->

         </div> <!-- /row -->

      </div> <!-- /container -->

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
                        <li><a href="alumnos.php">Alumnos</a></li>
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
      <!-- Placed at the end of the document so the pages load faster --> 
      <script src="../../assets/js/jquery-1.7.2.min.js"></script> 
      <script src="../../assets/js/excanvas.min.js"></script> 
      <script src="../../assets/js/chart.min.js" type="text/javascript"></script> 
      <script src="../../assets/js/bootstrap.js"></script>
      <script src="../../assets/js/base.js"></script>

      <script>

         var pieData = [

            <?php
$color = array("#0b486b", "#ffc400", "#14b0a6");
for($i=0; $i < count($numer); $i++){
   $value = $numer[$i]['estatus'];
   $colores = $color[$i];
   echo "{
      value: $value,
      color: '$colores'
      },";
   //$new_color = $color + 130;
}
            ?> 
         ];

         var myPie = new Chart(document.getElementById("pie-chart").getContext("2d")).Pie(pieData);

         var barChartData = {
            labels: [
               <?php

for($i=0; $i < 5; $i++){
   $numero = $i + 1;
   $resta = "- $numero day";
   $day = date("l", strtotime($resta));
   foreach($week as $day_es=>$day_in){
      if($day == $day_in){
         echo "'$day_es',";
      }


   }
}
echo  "'Total'";
               ?>
            ],
            datasets: [
               {
                  fillColor: "rgba(255,196,0,0.5)",
                  strokeColor: "rgba(255,196,0,1)",
                  data: [<?php
for($i=0; $i < 5; $i++){
   $numero = $i + 1;
   $resta = "- $numero day";
   $fecha1 = date("Y-m-d", strtotime($resta));
   $pagos = $pago->get_reporte_pago($fecha1);
   $f= 0;
   while($pagos2 = $pagos->fetchObject()){
      $total1 = $pagos2->pago + $pagos2->recargos + $f;
      $f = $total1;
   }
   echo "$total1,";
   $f = 0;
   $total1 = 0;
}

echo $total;?>]
               }
            ]

         }

         var myLine = new Chart(document.getElementById("bar-chart").getContext("2d")).Bar(barChartData);
         var myLine = new Chart(document.getElementById("bar-chart1").getContext("2d")).Bar(barChartData);
         var myLine = new Chart(document.getElementById("bar-chart2").getContext("2d")).Bar(barChartData);
         var myLine = new Chart(document.getElementById("bar-chart3").getContext("2d")).Bar(barChartData);

      </script>

   </body>
</html>