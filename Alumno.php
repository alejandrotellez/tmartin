<?php
require_once 'Conexion.php';
class Alumno{

   private static $instancia;
   private $con;
   private $matricula;
   private $a_paterno;
   private $a_materno;
   private $nombre;
   
   private $idSexo;
   private $idEstatus;
   private $idGg;
   private $idEscolaridad;
   private $idTutor;
   private $idBeca;

   public function __construct()
   {
      $this->con = Conexion::singleton_conexion();   
   }

   public function set_alumno($matricula, $a_paterno, $a_materno, $nombre, $idSexo, $idEstatus, $idGg, $idEscolaridad, $idTutor, $idBeca){
      $this->matricula= $matricula;
      $this->a_paterno= $a_paterno;       
      $this->a_materno= $a_materno;
      $this->nombre= $nombre;
      
      $this->idSexo= $idSexo;
      $this->idEstatus= $idEstatus;
      $this->idGg= $idGg;
      $this->idEscolaridad= $idEscolaridad;
      $this->idTutor= $idTutor;
      $this->idBeca= $idBeca;
   }

   public function get_alumno($matricula = null){
      try {          
         $sql = "SELECT * FROM alumno";

         if ($matricula != null){
            $sql .= " WHERE matricula = ?";
         }

         $consulta = $this->con->prepare($sql);

         if ($matricula!= null){
            $consulta->bindParam(1, $matricula);
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

   public function add_alumno(){
      try {
         if($this->matricul == null){
            $sql = "INSERT INTO alumno (matricula, a_paterno, a_materno, nombre, idsexo, idestatus, idgg, idescolaridad, idtutor, idbeca) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         }else{
            $sql = "UPDATE alumno SET a_paterno=?, a_materno=?, nombre=?, idsexo=?, idestatus=?, idgg=?, idescolaridad=?, idtutor=?, idbeca=? WHERE matricula = ?";
         }
         
         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(1, $this->a_paterno);
         $consulta->bindParam(2, $this->a_materno);
         $consulta->bindParam(3, $this->nombre);
         $consulta->bindParam(4, $this->idSexo);
         $consulta->bindParam(5, $this->idEstatus);
         $consulta->bindParam(6, $this->idGg);
         $consulta->bindParam(7, $this->idEscolaridad);
         $consulta->bindParam(8, $this->idTutor);
         $consulta->bindParam(9, $this->idBeca);

         if($this->matricula != null){
            $consulta->bindParam(10, $this->matricula);
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
   
   public function del_alumno($matricula) {
       try {
           $sql = "DELETE FROM alumno WHERE matricula = ?";
           $consulta = $this->con->prepare($sql);
           $consulta->bindParam(1, $matricula);
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