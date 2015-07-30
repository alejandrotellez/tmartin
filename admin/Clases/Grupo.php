<?php
require_once 'conexion.php';
class Grupo{

   private static $instancia;
   private $con;
   private $idgrupo;
   private $grupo;

   public function __construct(){
      $this->con = Conexion::singleton_conexion();
   }

   public function set_grupo($idgrupo, $grupo){
      $this->idgrupo = $idgrupo;
      $this->grupo = $grupo;
   }

   public function get_grupo($grupo = null){
      try{
         $sql = "SELECT * FROM grupo";

         if($grupo != null){
            $sql .= "WHERE grupo = :grupo";
         }

         $consulta = $this->con->prepare($sql);

         if($grupo != null){
            $consulta->bindParam(':grupo', $grupo, PDO::PARAM_INT);
         }

         $consulta->execute();

         if($consulta->rowCount() > 0){
            return $consulta;
         } else {
            return false;
         }

      } catch(PDOExeption $e){
         print "Error: ".$e->getMessage();
      }
   }
}