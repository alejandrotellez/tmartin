<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <title>Solicitud de Ingreso</title>

      <!-- CSS DE BOOTSTRAP >
<link href="../css/bootstrap2.css" rel="stylesheet"-->
      <link rel="stylesheet" href="../css/print.css">
   </head>
   <body>

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
                     <tr><td colspan="6">&nbsp;</td></tr>
                     <tr><td colspan="6">&nbsp;</td></tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    
                     <tr>
                        <th colspan="6">Información de Alumo</th>
                        

                     </tr>
                     <tr>
                        <th>Nombre</th>
                        <td colspan="3" class="table_information"><?php echo "$nombre $a_paterno $a_materno"?></td>
                        <th>Fecha</th>
                        <td class="table_information"><?php echo $fecha_actual;?></td>
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
                     <tr>
                        <th>Sexo</th>
                        <td class="table_information"><?php echo $sexo3; ?></td>
                        
                        <td class="table_information" colspan="4">&nbsp;</td>
                        
                     </tr>
                  
                     <tr><td colspan="6">&nbsp;</td></tr>
                     <tr><td colspan="6">&nbsp;</td></tr>
                     <tr><td colspan="6">&nbsp;</td></tr>
    <tr><td colspan="6">&nbsp;</td></tr>
                     <tr>
                        <th colspan="6">Información de Tutor</th>
                     </tr>
                     <tr>
                        <th>Nombre de Tutor</th>
                        <td class="table_information" colspan="6"><?php echo "$nombre_tutor $a_paterno_tutor $a_materno_tutor"; ?></td>
                        </tr>
                     <tr>
                        <th>Email</th>
                        <td class="table_information"><?php echo $email_tutor;?> </td>
                        <th>Telefono</th>
                        <td class="table_information"><?php echo $telefono_tutor;?></td>
                     </tr>
                     <tr><td colspan="6">&nbsp;</td></tr>
                     <tr><td colspan="6">&nbsp;</td></tr>
                     <tr><td colspan="6">&nbsp;</td></tr>
    <tr><td colspan="6">&nbsp;</td></tr>
                     <tr>
                        <td colspan="6"> Este formato de Solicitud es funcional para administración del colegio Teresa Martin. En caso de aclaracion o reclamos favor de comunicarse al Colegio Teresa Martin, 1 de Mayo # 123, Col. Centro, Tel. 123 456 7890</td>
                     </tr>
                  
               </table>

   </body>
</html>