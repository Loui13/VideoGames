<?php
   class Movil extends CI_Model
   {
     function __construct()
     {
       parent::__construct();
     }
     public function insertar($datos){
        return $this->db->insert("movil",$datos);
     }
     //Funcion que consulta todos los moviles de la bdd
     public function obtenerTodos(){
        $moviles=$this->db->get("movil");
        if ($moviles->num_rows()>0) {
          return $moviles;
        } else {
          return false;//cuando no hay datos
        }
     }
     //funcion para eliminar un movil se recibe el id
     public function eliminarPorId($id){
        $this->db->where("id_mov_fry",$id);
        return $this->db->delete("movil");
     }
     //Consultando el movil por su id
     public function obtenerPorId($id){
        $this->db->where("id_mov_fry",$id);
        $movil=$this->db->get("movil");
        if($movil->num_rows()>0){
          return $movil->row();//xq solo hay uno
        }else{
          return false;
        }
     }
     //Proceso de actualizacion de movils
     public function actualizar($id,$datos){
       $this->db->where("id_mov_fry",$id);
       return $this->db->update("movil",$datos);
     }

   }//Cierre de la clase (No borrar)
