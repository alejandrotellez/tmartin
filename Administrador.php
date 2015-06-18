<?php
require_once 'conexion.php';
class Administrador{

   private static $instancia;
   private $con;
   private $idAdministrador;
   private $nombre;
   private $a_paterno;
   private $a_materno;
   private $password;
   private $idPrivilegios;


   public function __construct()
   {
      $this->con = Conexion::singleton_conexion();   
   }

   public function set_administrador($idAdministrador, $nombre, $a_paterno, $a_materno, $password, $idPrivilegios){
      $this->idAdministrador = $idAdministrador;
      $this->nombre = $nombre;
      $this->a_paterno = $a_paterno;
      $this->a_materno = $a_materno;
      $this->password = $password;
      $this->idPrivilegios = $idPrivilegios;
   }

   public function login_administrador($idAdministrador, $password){
      try{
         $sql ="SELECT * FROM administrador WHERE idadministrador =? and password = ?";
         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(1 , $idAdministrador);
         $consulta->bindParam(2 , $password);
         $consulta->execute();
         

         if($consulta->rowCount()== 1){
            return TRUE;
         }

      }catch(PDOExeption $e){
         print "Error:". $e->getMessge();
      }
   }

   public function get_administrador($idAdministrador = null){
      try {          
         $sql = "SELECT * FROM administrador";

         if ($idAdministrador != null){
            $sql .= " WHERE idadministrador = ?";
         }

         $consulta = $this->con->prepare($sql);

         if ($idAdministrador != null){
            $consulta->bindParam(1, $idAdministrador);
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

   public function update_administrador(){
      try {
         
         if($this->idAdministrador == null){
            $sql = "INSERT INTO administrador(idadministrador, nombre, a_paterno, a_materno, password, idprivilegios) VALUES (NULL, ?, ?, ?, ?, ?)";
         }else{
            $sql = "UPDATE administrador SET nombre=? ,a_paterno=? ,a_materno=? ,password=? ,idprivilegios=?  WHERE idadministrador = ?";
         }

         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(1, $this->nombre);
         $consulta->bindParam(2, $this->a_paterno);
         $consulta->bindParam(3, $this->a_materno);
         $consulta->bindParam(4, $this->password);
         $consulta->bindParam(5, $this->idPrivilegios);         

         if($this->idAdministrador != null){
            $consulta->bindParam(6, $this->idAdministrador);
         } 
         
         if($consulta->execute()){
            return TRUE;
            echo $sql;
         }  else {
            return False;
         }
         

      } catch (PDOExeption $e) {
         print "Error:". $e->getMessge();
      }
   }
   
   public function add_administrador(){
      try {
            $sql = "INSERT INTO administrador(idadministrador, nombre, a_paterno, a_materno, password, idprivilegios) VALUES (?, ?, ?, ?, ?, ?)";
         
         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(1, $this->idAdministrador);
         $consulta->bindParam(2, $this->nombre);
         $consulta->bindParam(3, $this->a_paterno);
         $consulta->bindParam(4, $this->a_materno);
         $consulta->bindParam(5, $this->password);
         $consulta->bindParam(6, $this->idPrivilegios);
         
         if($consulta->execute()){
            return TRUE;
            echo $sql;
         }  else {
            return False;
         }
         

      } catch (PDOExeption $e) {
         print "Error:". $e->getMessge();
      }
   }


   public function del_administrador($idAdministrador) {
      try {
         $sql = "DELETE FROM administrador WHERE idadministrador = ?";
         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(1, $idAdministrador);
         if($consulta->execute()){
            return TRUE;
         }  else {
            return False;
         }
         
      } catch (PDOException $ex) {
         print "Error:". $e->getMessge();
      }
   }
   
   public function max_administrador(){
      $sql = "SELECT MAX(idadministrador) AS id FROM administrador";
      $consulta = $this->con->prepare($sql);
      $consulta->execute();
      return $consulta;
   }
   
    /* ------------------ ADD NO FUNCIONAL ----------------
    
    public function add_administrador(){
      try {
         
         if($this->idAdministrador == null){
            $sql = "INSERT INTO administrador(idadministrador, nombre, a_paterno, a_materno, password, idprivilegios) VALUES (NULL, ?, ?, ?, ?, ?)";
         }else{
            $sql = "UPDATE administrador SET nombre=? ,a_paterno=? ,a_materno=? ,password=? ,idprivilegios=?  WHERE idadministrador = ?";
         }

         $consulta = $this->con->prepare($sql);
         $consulta->bindParam(1, $this->nombre);
         $consulta->bindParam(2, $this->a_paterno);
         $consulta->bindParam(3, $this->a_materno);
         $consulta->bindParam(4, $this->password);
         $consulta->bindParam(5, $this->idPrivilegios);         

         if($this->idAdministrador != null){
            $consulta->bindParam(6, $this->idAdministrador);
         } 
         
         if($consulta->execute()){
            return TRUE;
            echo $sql;
         }  else {
            return False;
         }
         $this->con = null;

      } catch (PDOExeption $e) {
         print "Error:". $e->getMessge();
      }
   }*/
}