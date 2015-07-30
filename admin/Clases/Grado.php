<?php
require_once 'Conexion.php';
class Grado{

   private static $instancia;
   private $con;
   private $idGrado;
   private $grado;

   public function __construct()
   {
      $this->con = Conexion::singleton_conexion();   
   }

   public function set_grado($idGrado,$grado){
      $this->idGrado= $idGrado;
      $this->grado= $grado;
   }

   public function get_grado($idGrado = null){
      try {          
         $sql = "SELECT * FROM grado";

         if ($idGrado != null){
            $sql .= " WHERE idgrado = ?";
         }

         $consulta = $this->con->prepare($sql);

         if ($idGrado != null){
            $consulta->bindParam(1, $idGrado);
         }
         $consulta->execute();
         
         
         if($consulta->rowCount()>= 0){
            return $consulta;
         } else {
            return FALSE;
         }

      } catch (PDOExeption $e) {
         print "Error:". $e->getMessge();
      }  
   }

   public function add_grado(){
      try {
         if($this->idGrado == null){
            $sql = "INSERT INTO grado (`idgrado`, `grado`) VALUES (NULL, ?)";
         }else{
            $sql = "UPDATE sexo SET grado = ? WHERE idgrado = ?";
         }
         
         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(1, $this->grado);
         
         if($this->idSexo != null){
            $consulta->bindParam(2, $this->idgrado);
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
   
   public function del_grado($idGrado) {
       try {
           $sql = "DELETE FROM grado WHERE idgrado = ?";
           $consulta = $this->con->prepare($sql);
           $consulta->bindParam(1, $idGrado);
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