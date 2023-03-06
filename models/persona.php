<?php
    
    require_once 'config/db.php';
    class Persona{
        private $id;
        private $nombre;
        private $apellido;
        private $correo;
        private $edad;
        private $fechaOrigen;
        private $db;

        public function __construct(){
            $this->db=DB::connect();
        }

        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id=$id;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function getApellido(){
            return $this->apellido;
        }
        public function getCorreo(){
            return $this->correo;
        }
        public function getEdad(){
            return $this->edad;
        }

        public function setNombre($nombre){
            $this->nombre=$nombre;
        }
        public function setApellido($apellido){
            $this->apellido=$apellido;
        }
        public function setCorreo($correo){
            $this->correo=$correo;
        }
        public function setEdad($edad){
            $this->edad=$edad;
        }

        public function crearPersona(){
            $sql ="INSERT INTO persona VALUES(NULL,'{$this->getNombre()}','{$this->getApellido()}','{$this->getCorreo()}',{$this->getEdad()},CURDATE());";
            $resultado=$this->db->query($sql);
            $result=false;
            if ($resultado) {
                $result=true;
            }
            return $result;
        }
        public function allUser(){
            $sql="SELECT * FROM persona";
            $resultado=$this->db->query($sql);
            if ($resultado || $resultado->num_rows>0) {
                return $resultado;
            }else{
                $resultado=false;
                return $resultado;
            }
            
        }
        public function delete(){
            $sql="DELETE FROM persona WHERE id={$this->getId()};";
            $resultado=$this->db->query($sql);
            $result=false;
            if ($resultado) {
                $result=true;
            }
            return $result;
        }
        public function UserXId(){
            //VERIFICAR SI EXISTE EL ID 
            $sql="SELECT * FROM persona WHERE id={$this->getId()};";
            $resultado=$this->db->query($sql);
            $result=false;
            if ($resultado && $resultado->num_rows>0) {
                return $resultado;
            }else{
                
                return $resultado;
            }
            
        }
        public function modificarPersona(){
            $sqlModify="UPDATE persona SET nombre='{$this->getNombre()}', apellido='{$this->getApellido()}', correo='{$this->getCorreo()}',edad={$this->getEdad()} WHERE id={$this->getId()};";
            $modificacion=$this->db->query($sqlModify);
            $result=false;
            if ($modificacion) {
                $result=true;
            }
            return $result;
        }
    }

?>