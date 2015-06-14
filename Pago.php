<?php
require_once 'Conexion.php';
class Pago{

   private static $instancia;
   private $con;
   private $folio;
   private $mes;
   private $fechaactual;
   private $fechalimite;
   private $recargos;
   private $pagos;
   private $matricula;
   private $idAdministrador;


   public function __construct()
   {
      $this->con = Conexion::singleton_conexion();   
   }

   public function set_pago($folio, $mes, $fechaactual, $fechalimite, $recargos, $pagos, $matricula, $idAdministrador){
      $this->folio = $folio;
      $this->mes = $mes;
      $this->fechaactual = $fechaactual;
      $this->fechalimite = $fechalimite;
      $this->recargos = $recargos;
      $this->pagos = $pagos;
      $this->matricula = $matricula;
      $this->idAdministrador = $idAdministrador;
   }

   public function get_pago($folio = null){
      try {          
         $sql = "SELECT * FROM pago";

         if ($folio != null){
            $sql .= " WHERE folio = ?";
         }

         $consulta = $this->con->prepare($sql);

         if ($folio != null){
            $consulta->bindParam(1, $folio);
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

   public function add_pago(){
      try {
         if($this->folio == null){
            $sql = "INSERT INTO pago(folio, mes, fechaactual, fechalimite, recargos, pago, matricula, idadministrador) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)";
         }else{
            $sql = "UPDATE pago SET mes=? ,fechaactual=? ,fechalimite=? ,recargos=? ,pago=? ,matricula=? ,idadministrador=?  WHERE folio=?";
         }

         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(1, $this->mes);
         $consulta->bindParam(2, $this->fechaactual);
         $consulta->bindParam(3, $this->fechalimite);
         $consulta->bindParam(4, $this->recargos);
         $consulta->bindParam(5, $this->pagos);         
         $consulta->bindParam(6, $this->matricula); 
         $consulta->bindParam(7, $this->idAdministrador);

         if($this->idAdministrador != null){
            $consulta->bindParam(8, $this->folio);
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

   public function del_pago($folio) {
      try {
         $sql = "DELETE FROM pago WHERE folio = ?";
         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(1, $folio);
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