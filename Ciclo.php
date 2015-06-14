<?php
require_once 'Conexion.php';
require_once 'Year.php'
   
class Ciclo{

   private static $instancia;
   private $con;
   private $idCiclo;
   private $ciclo;
   private $idYear;
  
   public function __construct()
   {
      $this->con = Conexion::singleton_conexion();   
   }

   public function set_ciclo($idCiclo,$ciclo, $idYear){
      $this->idCiclo= $idCiclo;
      $this->ciclo= $ciclo;
      $this->idYear= $idYear;
   }

   public function get_ciclo($idCiclo = null){
      try {          
         $sql = "SELECT * FROM ciclo";

         if ($idCiclo != null){
            $sql .= " WHERE idciclo = ?";
         }

         $consulta = $this->con->prepare($sql);

         if ($idCiclo != null){
            $consulta->bindParam(1, $idCiclo);
         }

         $consulta->execute();
         $this->con = null;

         if($consulta->rowCount() > 0){
            return $consulta;
            echo $sql;
         } else {
            return FALSE;
         }

      } catch (PDOExeption $e) {
         print "Error:". $e->getMessge();
      }  
   }

   public function add_ciclo(){
      try {
         if($this->idCiclo == null){
            $sql = "INSERT INTO ciclo (idciclo, ciclo, idyear) VALUES (NULL, ?, ?)";
         }else{
            $sql = "UPDATE ciclo SET ciclo = ?, idyear = ? WHERE idciclo = ?";
         }
         
         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(1, $this->ciclo);
         $consulta->bindParam(2, $this->idYear);

         if($this->idCiclo != null){
            $consulta->bindParam(3, $this->idciclo);
         }

         if($consulta->execute()){
             return TRUE;
         }  else {
             return False;
         }
         $this->con = null;
    
      } catch (PDOExeption $e) {
         print "Error:". $e->getMessge();
      }
   }
   
   public function del_ciclo($idCiclo) {
       try {
           $sql = "DELETE FROM ciclo WHERE idciclo = ?";
           $consulta = $this->con->prepare($sql);
           $consulta->bindParam(1, $idCiclo);
           if($consulta->execute()){
                return TRUE;
            }  else {
                return False;
            }
            $this->con = null;
       } catch (PDOException $ex) {
           print "Error:". $e->getMessge();
       }
   }
}