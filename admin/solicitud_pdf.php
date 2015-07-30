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
      <div class="container">
         <div class="row">
            <div class="col-12" id="head">
               <div class="col-2">
                  <img id="escudo" src="../img/escudo.png" alt="Teresa Martin">
               </div>
               <div id="title" class="col-10">
                  <h1>Colegio Teresa Martin</h1>
                  <h2>Labor, Virtus y Scientia</h2>     
               </div>
            </div>
            
            <div class="col-12" id="body">
               <h2>Solicitud de Ingreso</h2>
               <div id="alumno">
                  <h3>Datos del alumno</h3>
                  <span class="line"><span class="subline"></span></span>
                  <div class="informacion">
                      <?php
echo $matricula."<br>";
echo $nombre."<br>";
echo $a_paterno."<br>";
echo $a_materno."<br>";
echo $sexo."<br>";
echo $grado."<br>";
echo $grupo."<br>";
echo $escolaridad."<br>";
echo $beca."<br>";
                  ?>
                  </div>
                 
               </div>
               <div id="tutor">
                  <h3>Datos del Tutor</h3>
                  <span class="line"><span class="subline"></span></span>
                  <div class="informacion">
                      <?php
echo $nombre_tutor."<br>";
echo $a_paterno_tutor."<br>";
echo $a_materno_tutor."<br>";
echo $email_tutor."<br>";
echo $telefono_tutor."<br>";
                  ?>
                  </div>
                  
                 
               </div>
               </div>
               <div class="col-12" id="footer">
                  <span class="line"></span>
                  <p>Colegio Teresa Matrin</p>
                  <p>1 de Mayo #123, Col. Centro</p>
                  <p>Acambaro, Gto.</p>
               </div>

            
         </div>
      </div>
   </body>
</html>