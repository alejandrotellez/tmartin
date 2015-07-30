<?php
require_once 'Conexion.php';
class Escolaridad{

   private static $instancia;
   private $con;
   private $idEscolaridad;
   private $escolaridad;
  
   public function __construct()
   {
      $this->con = Conexion::singleton_conexion();   
   }

   public function set_escolaridad($idEscolaridad,$escolaridad){
      $this->idEscolaridad= $idEscolaridad;
      $this->escolaridad= $escolaridad;
   }

   public function get_escolaridad($idEscolaridad = null){
      try {          
         $sql = "SELECT * FROM escolaridad";

         if ($idEscolaridad != null){
            $sql .= " WHERE idescolaridad = ?";
         }

         $consulta = $this->con->prepare($sql);

         if ($idEscolaridad != null){
            $consulta->bindParam(1, $idEscolaridad);
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

   public function add_escolaridad(){
      try {
         if($this->idEscolaridad == null){
            $sql = "INSERT INTO escolaridad (`idescolaridad`, `escolaridad`) VALUES (NULL, ?)";
         }else{
            $sql = "UPDATE escolaridad SET escolaridad = ? WHERE idescolaridad = ?";
         }
         
         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(1, $this->escolaridad);

         if($this->idEscolaridad != null){
            $consulta->bindParam(2, $this->idEscolaridad);
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
   
   public function del_escolaridad($idEscolariad) {
       try {
           $sql = "DELETE FROM escolaridad WHERE idescolaridad = ?";
           $consulta = $this->con->prepare($sql);
           $consulta->bindParam(1, $idEscolaridad);
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