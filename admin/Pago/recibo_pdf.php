<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <title>TERESA MARTIN</title>

      <!-- CSS DE AAA Y ASOCIADOS -->
      <link type="text/css" rel="stylesheet" href="../../assets/css/print_recibo.css">

   </head> 
   <body>


      <!-- ==================================================
CONTENIDO 
==================================================== -->


      <!-- ============== TABLA DE RECIBO ============== -->    
      <div class="span12">
         <!-- /widget -->                     
         <div class="widget widget-table action-table">
            <!-- /widget-header -->
            <div class="widget-content">

               <table class="table">
                  
                     <tr>
                        <th rowspan="3" colspan="2" id="escudo"> <img src="../../assets/img/escudo.png" alt="escudo"> </th>
                        <th colspan="4" id="colegio"> Colegio Teresa Martin </th>
                     </tr>
                     <tr>
                        <th colspan="4" id="labor"> Labor, Virtus y Scientia</th>
                     </tr>
                     <tr>
                        <th colspan="4" id="recibo"> Recibo de Pago</th>
                     </tr>
                  
                     <tr><td colspan="6">&nbsp;</td></tr>
                     <tr>
                        <th colspan="4">Información de Alumo</th>
                        <th>Fecha</th>
                        <td class="table_information"><?php echo $fecha_actual;?></td>
                     </tr>
                     <tr>
                        <th>Nombre</th>
                        <td colspan="4" class="table_information"><?php echo "$nombre $a_paterno $a_materno"?></td>
                        <th>Folio</th>
                        <td class="table_information"><?php echo $nota;?></td>
                        <!--th> Folio </th>
<td> <?php //echo $new_folio;?> </td-->
                     </tr>
                     <tr>
                        <th>Grado</th>
                        <td class="table_information"><?php echo $grado3; ?></td>
                        <th>Grupo</th>
                        <td class="table_information"><?php echo $grupo3;?> </td>
                        <th>Escolaridad</th>
                        <td class="table_information"><?php echo $escolaridad3;?></td>
                     </tr>
                     <tr><td colspan="6">&nbsp;</td></tr>
                     <tr>
                        <th class="table_body .table_body_th">No. Folio</th>
                        <th colspan="2" class="table_body">Descripción</th>
                        <th class="table_body .table_body_th">Precio Unitario</th>
                        <th class="table_body .table_body_th">Beca</th>
                        <th class="table_body .table_body_th">Total</th>
                     </tr>

                     <?php

foreach($mes as $mes){
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

                  
                     <tr><td colspan="6">&nbsp;</td></tr>
                     <tr>
                        <td colspan="6"> Este recibo es funcional para administración del colegio Teresa Martin. En caso de aclaracion o reclamos favor de comunicarse al Colegio Teresa Martin, 1 de Mayo # 123, Col. Centro, Tel. 123 456 7890</td>
                     </tr>
                  
               </table>
            </div>
            <!-- /widget-content --> 
         </div>
         <!-- /widget --> 
      </div>
      <!-- /span12 -->
   </body>
</html>

