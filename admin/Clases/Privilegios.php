<?php
require_once 'Conexion.php';
class Privilegios{

   private static $instancia;
   private $con;
   private $idPrivilegios;
   private $privilegios;
  
   public function __construct()
   {
      $this->con = Conexion::singleton_conexion();   
   }

   public function set_privilegios($idPrivilegios,$privilegios){
      $this->idPrivilegios= $idPrivilegios;
      $this->privilegios= $privilegios;
   }

   public function get_privilegios($idPrivilegios = null){
      try {          
         $sql = "SELECT * FROM privilegios";

         if ($idPrivilegios != null){
            $sql .= " WHERE idprivilegios = ?";
         }

         $consulta = $this->con->prepare($sql);

         if ($idPrivilegios != null){
            $consulta->bindParam(1, $idPrivilegios);
         }

         $consulta->execute();

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

   public function add_privilegios(){
      try {
         if($this->idPrivilegios == null){
            $sql = "INSERT INTO privilegios (`idprivilegios`, `privilegios`) VALUES (NULL, ?)";
         }else{
            $sql = "UPDATE privilegios SET privilegios = ? WHERE idprivilegios = ?";
         }
         
         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(1, $this->privilegios);

         if($this->idEscolaridad != null){
            $consulta->bindParam(2, $this->idPrivilegios);
         }

         if($consulta->execute()){
             return TRUE;
         }  else {
             return False;
         }
             
      } catch (PDOExeption $e) {
         print "Error:". $e->getMessge();
      }
   }
   
   public function del_Privilegios($idPrivilegios) {
       try {
           $sql = "DELETE FROM privilegios WHERE idprivilegios = ?";
           $consulta = $this->con->prepare($sql);
           $consulta->bindParam(1, $idPrivilegios);
           if($consulta->execute()){
                return TRUE;
            }  else {
                return False;
            }
            
       } catch (PDOException $ex) {
           print "Error:". $e->getMessge();
       }
   }
}