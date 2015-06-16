<?php
require_once 'Conexion.php';
require_once 'Year.php';
   
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

   public function get_ciclo($ciclo = null, $idYear = null){
      try {          
         $sql = "SELECT * FROM ciclo";

         if ($ciclo != null){
            $sql .= " WHERE ciclo = ? AND idyear = ?";            
         }   

         $consulta = $this->con->prepare($sql);

         if ($ciclo != null){
            $consulta->bindParam(1, $ciclo);
            $consulta->bindParam(2, $idYear);
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
         //if($this->idCiclo == null){
            $sql = "INSERT INTO ciclo VALUES (null,?,?)";
         /*}else{
            $sql = "UPDATE ciclo SET ciclo = ?, idyear = ? WHERE idciclo = ?";
         }*/
         
         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(1, $$this->ciclo);
         $consulta->bindParam(2, $$this->idYear);

         if($this->idCiclo != null){
            $consulta->bindParam(3, $this->idciclo);
         }

         if($consulta->execute()){
             return $sql;
         }  else {
             return FALSE;
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