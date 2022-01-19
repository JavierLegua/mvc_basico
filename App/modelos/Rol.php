<?php

    class Rol{

        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerRoles(){
            $this->db->query("SELECT * FROM roles");

            return $this->db->registros();
        }

        public function obtenerRolId($id){
            $this->db->query("SELECT * FROM roles WHERE id_rol = :id");
            $this->db->bind(':id',$id);

            return $this->db->registro();
        }

        public function borrarRol($id){
            $this->db->query("DELETE FROM roles WHERE id_rol = :id");
            $this->db->bind(':id',$id);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function agregarRol($datos){
            $this->db->query("INSERT INTO roles (id_rol, rol) 
                                        VALUES (:id_rol, :rol)");

            //vinculamos los valores
            $this->db->bind(':id_rol',$datos['id_rol']);
            $this->db->bind(':rol',$datos['rol']);

            //ejecutamos
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function actualizarRol($datos){
            $this->db->query("UPDATE roles SET id_rol=:id_rol_nuevo, rol=:rol WHERE id_rol = :id_rol");

            //vinculamos los valores
            $this->db->bind(':id_rol_nuevo',$datos['id_rol_nuevo']);
            $this->db->bind(':id_rol',$datos['id_rol']);
            $this->db->bind(':rol',$datos['rol']);

            //ejecutamos
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

    }
