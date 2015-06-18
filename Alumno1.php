<?php
include_once 'conexion.php';

class Alumno1{
   private static $instancia;
   private $con;
   
   function __construct(){
      $this->con = Conexion::singleton_conexion();
   }


public function add_alumno1($matricula, $a_paterno, $a_materno, $nombre, $idSexo, $idEstatus, $idGg, $idEscolaridad, $idTutor3, $idBeca,$idGrado, $idGrupo){
      try{
         $sql = "INSERT INTO alumno (matricula, a_paterno, a_materno, nombre, idsexo, idestatus, idgg, idescolaridad, idtutor, idbeca, idgrado, idgrupo) VALUES (:matricula, :a_paterno, :a_materno, :nombre, :idsexo, :idestatus, :idgg, :idescolaridad, :idtutor, :idbeca, :idgrado, :idgrupo)";
         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(':matricula', $matricula, PDO::PARAM_INT);
         $consulta->bindParam(':a_paterno', $a_paterno, PDO::PARAM_STR);
         $consulta->bindParam(':a_materno', $a_materno, PDO::PARAM_STR);
         $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
         $consulta->bindParam(':idsexo', $idSexo, PDO::PARAM_INT);
         $consulta->bindParam(':idestatus', $idEstatus, PDO::PARAM_INT);
         $consulta->bindParam(':idgg', $idGg, PDO::PARAM_INT);
         $consulta->bindParam(':idescolaridad', $idEscolaridad, PDO::PARAM_INT);
         $consulta->bindParam(':idtutor', $idTutor3, PDO::PARAM_INT);
         $consulta->bindParam(':idbeca', $idBeca, PDO::PARAM_INT);
         $consulta->bindParam(':idgrado', $idGrado, PDO::PARAM_INT);
         $consulta->bindParam(':idgrupo', $idGrupo, PDO::PARAM_STR);
                  
         $consulta->execute();         
         
         return $sql;
         
      }catch (PDOException $ex) {
           print "Error:". $e->getMessage();
       }
   }
}