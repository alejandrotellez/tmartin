<?php
require_once 'conexion.php';
class Slider{

   private static $instancia;
   private $con;
   private $nombre;
   private $url;

   function __construct()
   {
      $this->con = Conexion::singleton_conexion();   
   }

   public function set_slider($nombre,$url){
      $this->nombre = $nombre;
      $this->url = $url;
   }
   
   public function get_slider($idslider = null){
       try{
         $sql = "SELECT * FROM slider";
          
          if($idslider != null){
             $sql .="WHERE idslider = :idslider";
          }
      $consulta = $this->con->prepare($sql);
          
          if($idslider != null){
             $consulta->bindParam('::idslider', $idslider, PDO::PARAM_INT);
          }
            $consulta->execute();
      if($consulta->rowCount() > 0){
         return $consulta;
      }else{
         return FALSE;
      }
         
      }catch(PDOException $ex) {
           print "Error:". $e->getMessage();
       }
   }

   public function add_slider(){
      try{
         $sql = "INSERT INTO slider(idslider, url, nombre) VALUES (null, :url, :nombre)";
      $consulta = $this->con->prepare($sql);
      $consulta->bindParam(':url', $this->url, PDO::PARAM_STR);
      $consulta->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
      if($consulta->execute()){
         return TRUE;
      }else{
         return FALSE;
      }
         
      }catch(PDOException $ex) {
           print "Error:". $e->getMessage();
       }
      
   }
   
   public function del_slider($idslider){
      try {
           $sql = "DELETE FROM slider WHERE idslider = :idslider";
           $consulta = $this->con->prepare($sql);
           $consulta->bindParam(':idslider', $idslider, PDO::PARAM_INT);
           if($consulta->execute()){
                return TRUE;
            }  else {
                return false;
            }
            
       } catch (PDOException $ex) {
           print "Error:". $e->getMessge();
       }
   }

}