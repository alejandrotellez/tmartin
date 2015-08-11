<?php
require_once 'conexion.php';
class Noticia{

   private static $instancia;
   private $con;
   private $titulo;
   private $autor;
   private $fecha;
   private $urlimagen;
   private $descripcion;

   function __construct()
   {
      $this->con = Conexion::singleton_conexion();   
   }

   public function set_noticia($titulo, $autor, $fecha, $urlimagen, $descripcion){
      $this->titulo = $titulo;
      $this->autor = $autor;
      $this->fecha = $fecha;
      $this->urlimagen = $urlimagen;
      $this->descripcion = $descripcion;
   }
   
   public function get_noticia($idnoticia = null){
       try{
         $sql = "SELECT * FROM noticias ORDER BY idnoticia DESC";
          
          if($idnoticia != null){
             $sql .="WHERE idnoticia = :idnoticia";
          }
      $consulta = $this->con->prepare($sql);
          
          if($idnoticia != null){
             $consulta->bindParam('::idnoticia', $idnoticia, PDO::PARAM_INT);
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

   public function add_noticia(){
      try{
         $sql = "INSERT INTO noticias(idnoticia, titulo, autor, fecha, urlimagen, descripcion) VALUES (null, :titulo, :autor, :fecha, :urlimagen, :descripcion)";
      $consulta = $this->con->prepare($sql);
      $consulta->bindParam(':urlimagen', $this->urlimagen, PDO::PARAM_STR);
      $consulta->bindParam(':titulo', $this->titulo, PDO::PARAM_STR);
         $consulta->bindParam(':autor', $this->autor, PDO::PARAM_STR);
         $consulta->bindParam(':fecha', $this->fecha, PDO::PARAM_STR);
         $consulta->bindParam(':descripcion', $this->descripcion, PDO::PARAM_STR);
      if($consulta->execute()){
         return TRUE;
      }else{
         return FALSE;
      }
         
      }catch(PDOException $ex) {
           print "Error:". $e->getMessage();
       }
      
   }
   
   public function del_noticia($idnoticia){
      try {
           $sql = "DELETE FROM noticias WHERE idnoticia = :idnoticia";
           $consulta = $this->con->prepare($sql);
           $consulta->bindParam(':idnoticia', $idnoticia, PDO::PARAM_INT);
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