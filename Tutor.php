<?php
require_once 'Conexion.php';
class Tutor{

   private static $instancia;
   private $con;
   private $idTutor;
   private $a_paterno;
   private $a_materno;
   private $nombre;
   private $email;
   private $telefono;


   public function __construct()
   {
      $this->con = Conexion::singleton_conexion();   
   }

   public function set_tutor($idTutor, $a_paterno, $a_materno, $nombre, $email, $telefono){
      $this->idTutor = $idTutor;
      $this->a_paterno =  $a_paterno;
      $this->a_materno = $a_materno;
      $this->nombre = $nombre;
      $this->email = $email;
      $this->telefono = $telefono;
   }

   public function get_tutor($idTutor = null, $email=null){
      try { 
         if($email == null){
            $sql = "SELECT * FROM tutor";
         }else{
            $sql = "SELECT idtutor FROM tutor";
         }
         

         if ($idTutor != null and $email == null){
            $sql .= " WHERE idtutor = ?";
         }
         if ($email != null and $idTutor == null){
            $sql .= " WHERE email = ?";
         }

         $consulta = $this->con->prepare($sql);

         if ($idTutor != null and $email == null){
            $consulta->bindParam(1, $idTutor);
         }
         if ($email != null and $idTutor == null){
            $consulta->bindParam(1, $email);
         }

         $consulta->execute();

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

   public function add_tutor(){
      try {
         if($this->idTutor == null){
            $sql = "INSERT INTO tutor (idtutor, a_paterno, a_materno, nombre, email, telefono) VALUES (NULL,?,?,?,?,?)";
         }else{
            $sql = "UPDATE tutor SET a_paterno = ?, a_materno = ?, nombre = ?, email = ?, telefono = ? WHERE idtutor = ?";
         }

         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(1, $this->a_paterno);
         $consulta->bindParam(2, $this->a_materno);
         $consulta->bindParam(3, $this->nombre);
         $consulta->bindParam(4, $this->email);
         $consulta->bindParam(5, $this->telefono);         

         if($this->idTutor != null){
            $consulta->bindParam(6, $this-> idTutor);
         }

         if($consulta->execute()){
            return TRUE;
         }  else {
            return False;
         }

      } catch (PDOExeption $e) {
         print "Error:". $e->getMessge();
      }
   }

   public function del_tutor($idTutor) {
      try {
         $sql = "DELETE FROM tutor WHERE idtutor = ?";
         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(1, $idTutor);
         if($consulta->execute()){
            return TRUE;
         }  else {
            return False;
         }
         
      } catch (PDOException $ex) {
         print "Error:". $e->getMessge();
      }
   }
}