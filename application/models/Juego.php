<?php
   class Juego extends CI_Model
   {
     function __construct()
     {
       parent::__construct();
     }
     public function insertar($datos){
        return $this->db->insert("juego",$datos);
     }
     //Funcion que consulta todos los profesores de la bdd
     public function obtenerTodos(){
        $juegos=$this->db->get("juego");
        if ($juegos->num_rows()>0) {
          return $juegos;
        } else {
          return false;//cuando no hay datos
        }
     }
     //funcion para eliminar un juego se recibe el id
     public function eliminarPorId($id){
        $this->db->where("id_jue_fry",$id);
        return $this->db->delete("juego");
     }
     //Consultando el juego por su id
     public function obtenerPorId($id){
        $this->db->where("id_jue_fry",$id);
        $juego=$this->db->get("juego");
        if($juego->num_rows()>0){
          return $juego->row();//xq solo hay uno
        }else{
          return false;
        }
     }
     //Proceso de actualizacion de juegos
     public function actualizar($id,$datos){
       $this->db->where("id_jue_fry",$id);
       return $this->db->update("juego",$datos);
     }

   }//Cierre de la clase (No borrar)
