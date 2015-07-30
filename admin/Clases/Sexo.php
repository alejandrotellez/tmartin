<?php
require_once 'Conexion.php';
class Sexo{

   private static $instancia;
   private $con;
   private $idSexo;
   private $sexo;

   public function __construct()
   {
      $this->con = Conexion::singleton_conexion();   
   }

   public function set_sexo($idSexo,$sexo){
      $this->idSexo= $idSexo;
      $this->sexo= $sexo;
   }

   public function get_sexo($idSexo = null){
      try {          
         $sql = "SELECT * FROM sexo";

         if ($idSexo != null){
            $sql .= " WHERE idsexo = ?";
         }

         $consulta = $this->con->prepare($sql);

         if ($idSexo != null){
            $consulta->bindParam(1, $idSexo);
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
         print "Error:". $e->getMessage();
      }  
   }

   public function add_sexo(){
      try {
         if($this->idSexo == null){
            $sql = "INSERT INTO sexo (`idSexo`, `sexo`) VALUES (NULL, ?)";
         }else{
            $sql = "UPDATE sexo SET sexo = ? WHERE idsexo = ?";
         }
         
         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(1, $this->sexo);
         
         if($this->idSexo != null){
            $consulta->bindParam(2, $this->idSexo);
         }
         
         if($consulta->execute()){
             return TRUE;
         }  else {
             return False;
         }
         $this->con = null;
    
      } catch (PDOExeption $e) {
         print "Error:". $e->getMessage();
      }
   }
   
   public function del_sexo($idSexo) {
       try {
           $sql = "DELETE FROM sexo WHERE idsexo = ?";
           $consulta = $this->con->prepare($sql);
           $consulta->bindParam(1, $idSexo);
           if($consulta->execute()){
                return TRUE;
            }  else {
                return False;
            }
            $this->con = null;
       } catch (PDOException $ex) {
           print "Error:". $e->getMessage();
       }
   }
}