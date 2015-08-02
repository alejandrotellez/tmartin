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

   public function get_pago($matricula, $mes = null){
      try{

         $sql = "SELECT * FROM pago WHERE matricula = :matricula";         
         if($mes != null){
            $sql .= " AND mes = :mes";
         }

         $consulta = $this->con->prepare($sql);

         $consulta->bindParam(':matricula', $matricula, PDO::PARAM_INT);         
         if($mes != null){
            $consulta->bindParam(':mes', $mes, PDO::PARAM_STR);
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

   public function add_pago($folio, $mes, $fechaactual, $fechalimite, $recargos, $pago, $matricula, $idadministrador){
      try{
         $sql = "INSERT INTO pago(folio, mes, fechaactual, fechalimite, recargos, pago, matricula, idadministrador) VALUES (:folio, :mes, :fechaactual, :fechalimite, :recargos, :pago, :matricula, :idadministrador)";
         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(':folio', $folio, PDO::PARAM_NULL);
         $consulta->bindParam(':mes', $mes, PDO::PARAM_STR);
         $consulta->bindParam(':fechaactual', $fechaactual, PDO::PARAM_STR);
         $consulta->bindParam(':fechalimite', $fechalimite, PDO::PARAM_STR);
         $consulta->bindParam(':recargos', $recargos, PDO::PARAM_INT);
         $consulta->bindParam(':pago', $pago, PDO::PARAM_INT);
         $consulta->bindParam(':matricula', $matricula, PDO::PARAM_INT);
         $consulta->bindParam(':idadministrador', $idadministrador, PDO::PARAM_INT);

         $resultado = $consulta->execute();
         return $resultado;
      }catch (PDOException $ex) {
         print "Error:". $e->getMessge();
      }      
   }
}