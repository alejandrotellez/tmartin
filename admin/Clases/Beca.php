<?php
require_once 'Conexion.php';
class Beca{

   private static $instancia;
   private $con;
   private $idBeca;
   private $nombre;
   private $descuento;
  
   public function __construct()
   {
      $this->con = Conexion::singleton_conexion();   
   }

   public function set_beca($idBeca,$nombre, $descuento){
      $this->idBeca= $idBeca;
      $this->nombre= $nombre;       
      $this->descuento= $descuento;
   }

   public function get_beca($idBeca = null, $nombre = null){
      try { 
         
        if ($nombre != null){
            $sql = " SELECT idbeca FROM beca";
         }else{
           $sql = "SELECT * FROM beca";
        }       
         
         if ($idBeca != null){
            $sql .= " WHERE idbeca = ?";
         }
         
         if ($nombre != null){
            $sql .= " WHERE nombre = ?";
         }

         $consulta = $this->con->prepare($sql);

         if ($idBeca != null){
            $consulta->bindParam(1, $idBeca);
         }
         if ($nombre != null){
            $consulta->bindParam(1, $nombre);
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

   public function add_beca(){
      try {
         if($this->idBeca == null){
            $sql = "INSERT INTO beca (`idbeca`, `nombre`, `descuento`) VALUES (NULL, ?, ?)";
         }else{
            $sql = "UPDATE beca SET nombre = ?, descuento = ? WHERE idbeca = ?";
         }
         
         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(1, $this->nombre);
         $consulta->bindParam(2, $this->descuento);

         if($this->idBeca != null){
            $consulta->bindParam(3, $this->idBeca);
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
   
   public function del_beca($idBeca) {
       try {
           $sql = "DELETE FROM beca WHERE idbeca = ?";
           $consulta = $this->con->prepare($sql);
           $consulta->bindParam(1, $idBeca);
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