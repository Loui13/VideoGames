<?php
   class Nuevo extends CI_Model
   {
     function __construct()
     {
       parent::__construct();
     }
     public function insertar($datos){
        return $this->db->insert("nuevo",$datos);
     }
     //Funcion que consulta todos los nuevoes de la bdd
     public function obtenerTodos(){
        $nuevos=$this->db->get("nuevo");
        if ($nuevos->num_rows()>0) {
          return $nuevos;
        } else {
          return false;//cuando no hay datos
        }
     }
     //funcion para eliminar un nuevo se recibe el id
     public function eliminarPorId($id){
        $this->db->where("id_nue_fry",$id);
        return $this->db->delete("nuevo");
     }
     //Consultando el nuevo por su id
     public function obtenerPorId($id){
        $this->db->where("id_nue_fry",$id);
        $nuevo=$this->db->get("nuevo");
        if($nuevo->num_rows()>0){
          return $nuevo->row();//xq solo hay uno
        }else{
          return false;
        }
     }
     //Proceso de actualizacion de nuevs
     public function actualizar($id,$datos){
       $this->db->where("id_nue_fry",$id);
       return $this->db->update("nuevo",$datos);
     }

   }//Cierre de la clase (No borrar)
