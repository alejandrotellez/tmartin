<?php
require_once 'Conexion.php';
class Estatus{

   private static $instancia;
   private $con;
   private $idEstatus;
   private $estatus;

   public function __construct()
   {
      $this->con = Conexion::singleton_conexion();   
   }

   public function set_estatus($idEstatus,$estatus){
      $this->idEstatus= $idEstatus;
      $this->estatus= $estatus;
   }

   public function get_estatus($idEstatus = null){
      try {          
         $sql = "SELECT * FROM estatus";

         if ($idEstatus != null){
            $sql .= " WHERE idestatus = ?";
         }

         $consulta = $this->con->prepare($sql);

         if ($idEstatus != null){
            $consulta->bindParam(1, $idEstatus);
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

   public function add_estatus(){
      try {
         if($this->idEstatus == null){
            $sql = "INSERT INTO estatus (`idestatus`, `estatus`) VALUES (NULL, ?)";
         }else{
            $sql = "UPDATE estatus SET estatus = ? WHERE idestatus = ?";
         }
         
         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(1, $this->estatus);

         if($this->idEstatus != null){
            $consulta->bindParam(2, $this->idEstatus);
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
   
   public function del_estatus($idEstatus) {
       try {
           $sql = "DELETE FROM estatus WHERE idestatus = ?";
           $consulta = $this->con->prepare($sql);
           $consulta->bindParam(1, $idEstatus);
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