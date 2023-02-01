<?php
   class Noticia extends CI_Model
   {
     function __construct()
     {
       parent::__construct();
     }
     public function insertar($datos){
        return $this->db->insert("noticia",$datos);
     }
     //Funcion que consulta todos los noticiaes de la bdd
     public function obtenerTodos(){
        $noticias=$this->db->get("noticia");
        if ($noticias->num_rows()>0) {
          return $noticias;
        } else {
          return false;//cuando no hay datos
        }
     }
     //funcion para eliminar un noticia se recibe el id
     public function eliminarPorId($id){
        $this->db->where("id_not_fry",$id);
        return $this->db->delete("noticia");
     }
     //Consultando el noticia por su id
     public function obtenerPorId($id){
        $this->db->where("id_not_fry",$id);
        $noticia=$this->db->get("noticia");
        if($noticia->num_rows()>0){
          return $noticia->row();//xq solo hay uno
        }else{
          return false;
        }
     }
     //Proceso de actualizacion de noticias
     public function actualizar($id,$datos){
       $this->db->where("id_not_fry",$id);
       return $this->db->update("noticia",$datos);
     }

   }//Cierre de la clase (No borrar)
