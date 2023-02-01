<?php

    class Configuracion extends  CI_Model{
        function __construct()
        {
            parent::__construct();
        }
    public function insertar($datos)
    {
        return $this->db->insert("configuracion",$datos);
    }
    //Funcion que consulta todos los profesores de la base de datos
    public function obtenerTodos(){
        $configuracion=$this->db->get("configuracion");
        if ($configuracion->num_rows()>0) {
            return $configuracion;
        } else {
            return false; //cuando no existen datos
        }
        
    }
    //funcion para eliminar a un estudiante mediante su id
    public function eliminarPorId($id){
        $this->db->where("id_fry", $id);
        return $this->db->delete("configuracion");
    }
     //Consultando al estudainte por su id
     public function obtenerPorId($id){

        $this->db->where("id_fry",$id);
        $configuracion=$this->db->get("configuracion");
        if ($configuracion->num_rows()>0) {
            return $configuracion->row();// Por que solo existe un estudiante, debido a que el id no se puede repetir
        } else {
            return false;
        }
        
    } 
    //Proceso de actualizacion del maestro
    

    }//Cierre de clases no borrar
