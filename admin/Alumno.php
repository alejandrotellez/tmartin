<?php
require_once 'conexion.php';
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
   private $idGrado;
   private $idGrupo;

   public function __construct()
   {
      $this->con = Conexion::singleton_conexion();   
   }

   public function set_alumno($matricula, $a_paterno, $a_materno, $nombre, $idSexo, $idEstatus, $idGg, $idEscolaridad, $idTutor, $idBeca, $idGrado, $idGrupo){
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
      $this->idGrado = $idGrado;
      $this->idGrupo = $idGrupo;
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
         
         if($consulta->rowCount() > 0){
            return $consulta;
            //echo $sql;
         } else {
            return FALSE;
         }

      } catch (PDOExeption $e) {
         print "Error:". $e->getMessge();
      }  
   }

   public function add_alumno(){
      try {
         if($this->matricula == null){
            $sql = "INSERT INTO alumno (matricula, a_paterno, a_materno, nombre, idsexo, idestatus, idgg, idescolaridad, idtutor, idbeca, idgrupo, idgrado) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         }else{
            $sql = "UPDATE alumno SET a_paterno=?, a_materno=?, nombre=?, idsexo=?, idestatus=?, idgg=?, idescolaridad=?, idtutor=?, idbeca=?, idgrupo=?, idgrado=? WHERE matricula = ?";
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
         $consulta->bindParam(10, $this->idGrado);
         $consulta->bindParam(11, $this->idGrupo);
         

         if($this->matricula != null){
            $consulta->bindParam(12, $this->matricula);
         }
         
         var_dump($consulta);

         /*if($consulta->execute()){
             return TRUE;
         }  else {
             return False;
         }*/
             
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
           
       } catch (PDOException $ex) {
           print "Error:". $e->getMessge();
       }
   }
   
   public function max_alumno(){
      $sql = "SELECT MAX(matricula) AS id FROM alumno";
      $consulta = $this->con->prepare($sql);
      $consulta->execute();
      return $consulta;
   }
   
   public function add_alumno1($matricula, $a_paterno, $a_materno, $nombre, $idSexo, $idEstatus, $idGg, $idEscolaridad, $idTutor3, $idBeca,$idGrado, $idGrupo){
      try{
         $sql = "INSERT INTO alumno (matricula, a_paterno, a_materno, nombre, idsexo, idestatus, idgg, idescolaridad, idtutor, idbeca, idgrado, idgrupo) VALUES (:matricula, :a_paterno, :a_materno, :nombre, :idsexo, :idestatus, :idgg, :idescolaridad, :idtutor, :idbeca, :idgrado, :idgrupo)";
         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(':matricula', $matricula, PDO::PARAM_INT);
         $consulta->bindParam(':a_paterno', $a_paterno, PDO::PARAM_STR);
         $consulta->bindParam(':a_materno', $a_materno, PDO::PARAM_STR);
         $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
         $consulta->bindParam(':idsexo', $idSexo, PDO::PARAM_INT);
         $consulta->bindParam(':idestatus', $idEstatus, PDO::PARAM_INT);
         $consulta->bindParam(':idgg', $idGg, PDO::PARAM_INT);
         $consulta->bindParam(':idescolaridad', $idEscolaridad, PDO::PARAM_INT);
         $consulta->bindParam(':idtutor', $idTutor3, PDO::PARAM_INT);
         $consulta->bindParam(':idbeca', $idBeca, PDO::PARAM_INT);
         $consulta->bindParam(':idgrado', $idGrado, PDO::PARAM_INT);
         $consulta->bindParam(':idgrupo', $idGrupo, PDO::PARAM_STR);
         
         echo $matricula." ". $a_paterno." ". $a_materno." ". $nombre." ". $idSexo." ". $idEstatus." ". $idGg." ". $idEscolaridad." ". $idTutor3." ". $idBeca." ".$idGrado." ". $idGrupo."    ";
         var_dump($consulta);
                
         if($consulta->execute()){
             return true;
         }  else {
             return false;
         }      
         
         
      }catch (PDOException $ex) {
           print "Error:". $e->getMessage();
       }
   }
   
   public function update_alumno1($matricula, $a_paterno, $a_materno, $nombre, $idSexo, $idEstatus, $idGg, $idEscolaridad, $idTutor3, $idBeca,$idGrado, $idGrupo){
      try{
         $sql = "UPDATE alumno SET a_paterno=:a_paterno, a_materno=:a_materno, nombre=:nombre, idsexo=:idsexo, idestatus=:idestatus, idgg=:idgg, idescolaridad=:idescolaridad, idtutor=:idtutor, idbeca=:idbeca, idgrupo=:idgrupo, idgrado=:idgrado WHERE matricula = :matricula";
         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(':matricula', $matricula, PDO::PARAM_INT);
         $consulta->bindParam(':a_paterno', $a_paterno, PDO::PARAM_STR);
         $consulta->bindParam(':a_materno', $a_materno, PDO::PARAM_STR);
         $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
         $consulta->bindParam(':idsexo', $idSexo, PDO::PARAM_INT);
         $consulta->bindParam(':idestatus', $idEstatus, PDO::PARAM_INT);
         $consulta->bindParam(':idgg', $idGg, PDO::PARAM_INT);
         $consulta->bindParam(':idescolaridad', $idEscolaridad, PDO::PARAM_INT);
         $consulta->bindParam(':idtutor', $idTutor3, PDO::PARAM_INT);
         $consulta->bindParam(':idbeca', $idBeca, PDO::PARAM_INT);
         $consulta->bindParam(':idgrado', $idGrado, PDO::PARAM_INT);
         $consulta->bindParam(':idgrupo', $idGrupo, PDO::PARAM_STR);
         
         echo $matricula." ". $a_paterno." ". $a_materno." ". $nombre." ". $idSexo." ". $idEstatus." ". $idGg." ". $idEscolaridad." ". $idTutor3." ". $idBeca." ".$idGrado." ". $idGrupo."    ";
         var_dump($consulta);
                
         if($consulta->execute()){
             return true;
         }  else {
             return false;
         }      
         
         
      }catch (PDOException $ex) {
           print "Error:". $e->getMessage();
       }
   }
}