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

      <table class="col-12">
         <tr>
            <td class="col-4" rowspan="2"><img id="escudo" src="../../assets/img/escudo.png" alt="Teresa Martin"></td>
            <td class="col-8">
               <h1>Colegio Teresa Martin</h1> 
               <h2>Labor, Virtus y Scientia</h2> 
            </td>
         </tr>
         <tr>
            <td  colspan="2" id="title">
               <h2>Solicitud de Ingreso</h2>
            </td>
         </tr>
         <tr>
            <td colspan="2">
               <p>Datos del Alumno</p>
               <span class="line"><span class="subline"></span></span>
            </td>
         </tr>
         <tr>
            <td colspan="2" class="informacion"><?php
echo $matricula."<br>";
echo $nombre."<br>";
echo $a_paterno."<br>";
echo $a_materno."<br>";
echo $sexo."<br>";
echo $grado."<br>";
echo $grupo."<br>";
echo $escolaridad."<br>";
echo $beca."<br>";
               ?></td>
         </tr>
         <tr>
            <td colspan="2">
               <p>Datos del Tutor</p>
               <span class="line"><span class="subline"></span></span>
            </td>
         </tr>
         <tr>
            <td colspan="2" class="informacion">
            <div for="" class="info-name">Nombre:</div>
            <div for=""> <?php echo $nombre_tutor." ".$a_paterno_tutor." ".$a_materno_tutor;?></div>
            <br>            
            <label for=""><span class="info-name">Email:</span> <?php echo $email_tutor;?></label>
            <br>
            <label for=""><span class="info-name">Telefono:</span> <?php echo $telefono_tutor;?></label>
            </td>
         </tr>
         <tr>
            <td colspan="2" id="footer">
               <span class="line"></span>
         <p>Colegio Teresa Matrin</p>
         <p>1 de Mayo #123, Col. Centro</p>
         <p>Acambaro, Gto.</p>
            </td>
         </tr>
      </table>  

   </body>
</html>