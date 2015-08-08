<?php

include_once 'conexion.php';

class Pago1{
   private static $instancia;
   private $con;

   private $folio;
   private $mes;
   private $fechaactual;
   private $fechalimite;
   private $recargos;
   private $pago;
   private $matricula;
   private $idAdministrador;

   function __construct()
   {
      $this->con = Conexion::singleton_conexion();   
   }

   public function get_pago($matricula, $mes = null, $fecha1 = null, $fecha2 = null){
      try{

         $sql = "SELECT * FROM pago WHERE matricula = :matricula";         
         if($mes != null){
            $sql .= " AND mes = :mes";
         }

         if($fecha1 != null){
            $sql .= " AND fechaactual = :fechaactual";
         }

         $consulta = $this->con->prepare($sql);

         $consulta->bindParam(':matricula', $matricula, PDO::PARAM_INT);         
         if($mes != null){
            $consulta->bindParam(':mes', $mes, PDO::PARAM_STR);
         }
         if($fecha1 != null){
            $consulta->bindParam(':fechaactual', $fecha1, PDO::PARAM_STR);
         }

         if($consulta->execute()){
            return $consulta;
         }else{
            return false;
         }

      }catch (PDOException $ex) {
         print "Error:". $e->getMessge();
      }   

   }

   public function add_pago($folio, $mes, $fechaactual, $fechalimite, $recargos, $pago, $matricula, $idadministrador, $nota){
      try{
         $sql = "INSERT INTO pago(folio, mes, fechaactual, fechalimite, recargos, pago, matricula, idadministrador, nota) VALUES (:folio, :mes, :fechaactual, :fechalimite, :recargos, :pago, :matricula, :idadministrador, :nota)";
         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(':folio', $folio, PDO::PARAM_NULL);
         $consulta->bindParam(':mes', $mes, PDO::PARAM_STR);
         $consulta->bindParam(':fechaactual', $fechaactual, PDO::PARAM_STR);
         $consulta->bindParam(':fechalimite', $fechalimite, PDO::PARAM_STR);
         $consulta->bindParam(':recargos', $recargos, PDO::PARAM_INT);
         $consulta->bindParam(':pago', $pago, PDO::PARAM_INT);
         $consulta->bindParam(':matricula', $matricula, PDO::PARAM_INT);
         $consulta->bindParam(':idadministrador', $idadministrador, PDO::PARAM_INT);
         $consulta->bindParam(':nota', $nota, PDO::PARAM_INT);

         $resultado = $consulta->execute();
         return $resultado;
      }catch (PDOException $ex) {
         print "Error:". $e->getMessge();
      }      
   }

   public function get_folio(){
      try{
         $sql = "SELECT MAX(nota) AS folio FROM pago";
         $consulta = $this->con->prepare($sql);
         if($consulta->execute()){
            return $consulta;
         } 

      }catch (PDOException $ex) {
         print "Error:". $e->getMessge();
      } 
   }

   public function get_reporte_pago($fecha1= null, $fecha2 = null){
      try{

         $sql = "SELECT * FROM pago";     

         if($fecha1 != null){
            if($fecha2 == null){
               $sql .= " WHERE fechaactual= :fecha1";
            }else{
               $sql .= " WHERE fechaactual between :fecha1 and :fecha2";
            }            
         }

         $consulta = $this->con->prepare($sql);

         if($fecha1 != null){
            if($fecha2 == null){
              $consulta->bindParam(':fecha1', $fecha1, PDO::PARAM_STR);
            }else{
               $consulta->bindParam(':fecha1', $fecha1, PDO::PARAM_STR);
               $consulta->bindParam(':fecha2', $fecha2, PDO::PARAM_STR);
            }            
         }
                 
         if($consulta->execute()){
            return $consulta;
         }else{
            return false;
         }

      }catch (PDOException $ex) {
         print "Error:". $e->getMessge();
      }   
   }
   
   public function get_reporte_pago2($fecha1){
      try{
         $sql = "SELECT * FROM pago  WHERE fechaactual= :fecha1";
         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(':fecha1', $fecha1, PDO::PARAM_STR);
         if($consulta->execute()){
            return $consulta;
         } 

      }catch (PDOException $ex) {
         print "Error:". $e->getMessge();
      } 
   }
      
}