<?php
require_once 'Conexion.php';
   
class Gg{

   private static $instancia;
   private $con;
   private $idGg;
   private $grado;
   private $grupo;
  
   public function __construct()
   {
      $this->con = Conexion::singleton_conexion();   
   }

   public function set_gg($idGg,$grado, $grupo){
      $this->idGg= $idGg;
      $this->grado= $grado;
      $this->grupo= $grupo;
   }

   public function get_gg($idGg = null){
      try {          
         $sql = "SELECT * FROM gg";

         if ($idGg != null){
            $sql .= " WHERE idgg = ?";
         }

         $consulta = $this->con->prepare($sql);

         if ($idGg != null){
            $consulta->bindParam(1, $idGg);
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

   public function add_gg(){
      try {
         if($this->idGg == null){
            $sql = "INSERT INTO gg (idgg, grado, grupo) VALUES (NULL, ?, ?)";
         }else{
            $sql = "UPDATE gg SET grado = ?, grupo = ? WHERE idgg = ?";
         }
         
         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(1, $this->grado);
         $consulta->bindParam(2, $this->grupo);

         if($this->idGg != null){
            $consulta->bindParam(3, $this->idGg);
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
   
   public function del_gg($idGg) {
       try {
           $sql = "DELETE FROM gg WHERE idgg = ?";
           $consulta = $this->con->prepare($sql);
           $consulta->bindParam(1, $idGg);
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