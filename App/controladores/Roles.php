<?php

    class Roles extends Controlador{

        public function __construct(){

            $this->rolModelo = $this->modelo('Rol');

            $this->datos['menuActivo'] = 2;         // Definimos el menu que sera destacado en la vista
            
        }

        public function index(){
            //Obtenemos los roles
            $roles = $this->rolModelo->obtenerRoles();

            $this->datos['roles'] = $roles;

            $this->vista('roles/inicio',$this->datos);
        }

        public function borrar($id){
            //obtenemos información del usuario desde del modelo
            $roles = $this->rolModelo->obtenerRolId($id);

            $this->datos['id_rol'] = $roles->id_rol;
            $this->datos['rol'] = $roles->rol;
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($this->rolModelo->borrarRol($id)){
                    redireccionar('/roles');
                } else {
                    die('Algo ha fallado!!!');
                }
            }
            $this->vista('roles/borrar',$this->datos);
        }

        public function agregar(){

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $rolNuevo = [
                    'id_rol' => trim($_POST['id']),
                    'rol' => trim($_POST['rol'])
                ];

                if ($this->rolModelo->agregarRol($rolNuevo)){
                    redireccionar('/roles');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                $this->datos['rol'] = (object) [
                    'id_rol' => '',
                    'rol' => ''
                ];

                $this->vista('roles/agregar_editar',$this->datos);
            }
        }

        public function editar($idRol){

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $rolModificado = [
                    'id_rol' => $idRol,
                    'id_rol_nuevo' => trim($_POST['id']),
                    'rol' => trim($_POST['rol']),
                ];

                if ($this->rolModelo->actualizarRol($rolModificado)){
                    redireccionar('/roles');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                //obtenemos información del usuario y el listado de roles desde del modelo
                $this->datos['rol'] = $this->rolModelo->obtenerRolId($idRol);
                //$this->datos['listaRoles'] = $this->usuarioModelo->obtenerRoles();

                $this->vista('roles/agregar_editar',$this->datos);
            }
        }

    }