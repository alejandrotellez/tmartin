<?php
require_once 'Conexion.php';
   
class Detalle{

   private static $instancia;
   private $con;
   private $idDetalle;
   private $idCiclo;
   private $idGg;
  
   public function __construct()
   {
      $this->con = Conexion::singleton_conexion();   
   }

   public function set_detalle($idDetalle,$idCiclo, $idGg){
      $this->idDetalle= $idDetalle;
      $this->idCiclo= $idCiclo;
      $this->idGg= $idGg;
   }

   public function get_detalle($idDetalle = null){
      try {          
         $sql = "SELECT * FROM detalle";

         if ($idDetalle != null){
            $sql .= " WHERE idDetalle = ?";
         }

         $consulta = $this->con->prepare($sql);

         if ($idDetalle != null){
            $consulta->bindParam(1, $idDetalle);
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

   public function add_detalle(){
      try {
         if($this->idDetalle == null){
            $sql = "INSERT INTO Detalle (iddetalle, idciclo, idgg) VALUES (NULL, ?, ?, ?)";
         }else{
            $sql = "UPDATE detalle SET grado = ?, grupo = ? WHERE iddetalle = ?";
         }
         
         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(1, $this->idCiclo);
         $consulta->bindParam(2, $this->idGg);

         if($this->idDetalle != null){
            $consulta->bindParam(3, $this->iddetalle);
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
   
   public function del_detalle($idDetalle) {
       try {
           $sql = "DELETE FROM detalle WHERE iddetalle = ?";
           $consulta = $this->con->prepare($sql);
           $consulta->bindParam(1, $idDetalle);
           if($consulta->execute()){
                return TRUE;
            }  else {
                return False;
            }
            $this->con = null;
       } catch (PDOException $ex) {
           print "Error:". $e->getMessge();
       }