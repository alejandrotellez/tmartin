<?php
require_once 'Conexion.php';
class Year{

   private static $instancia;
   private $con;
   private $idYear;
   private $year;
  
   public function __construct()
   {
      $this->con = Conexion::singleton_conexion();   
   }

   public function set_year($idYear,$year){
      $this->idYear= $idYear;
      $this->year= $year;
   }

   public function get_year($idYear = null){
      try {          
         $sql = "SELECT * FROM year";

         if ($idYear != null){
            $sql .= " WHERE idyear = ?";
         }

         $consulta = $this->con->prepare($sql);

         if ($idYear != null){
            $consulta->bindParam(1, $idYear);
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

   public function add_year(){
      try {
         if($this->idYear == null){
            $sql = "INSERT INTO year (`idyear`, `year`) VALUES (NULL, ?)";
         }else{
            $sql = "UPDATE year SET year = ? WHERE idyear = ?";
         }
         
         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(1, $this->year);

         if($this->idEscolaridad != null){
            $consulta->bindParam(2, $this->idYear);
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
   
   public function del_year($idYear) {
       try {
           $sql = "DELETE FROM year WHERE idyear = ?";
           $consulta = $this->con->prepare($sql);
           $consulta->bindParam(1, $idYear);
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