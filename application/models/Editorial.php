<?php
   class Editorial extends CI_Model
   {
     function __construct()
     {
       parent::__construct();
     }
     public function insertar($datos){
        return $this->db->insert("editorial",$datos);
     }
     //Funcion que consulta todos los editoriales de la bdd
     public function obtenerTodos(){
        $editoriales=$this->db->get("editorial");
        if ($editoriales->num_rows()>0) {
          return $editoriales;
        } else {
          return false;//cuando no hay datos
        }
     }
     //funcion para eliminar un editorial se recibe el id
     public function eliminarPorId($id){
        $this->db->where("id_edi_fry",$id);
        return $this->db->delete("editorial");
     }
     //Consultando el editorial por su id
     public function obtenerPorId($id){
        $this->db->where("id_edi_fry",$id);
        $editorial=$this->db->get("editorial");
        if($editorial->num_rows()>0){
          return $editorial->row();//xq solo hay uno
        }else{
          return false;
        }
     }
     //Proceso de actualizacion de editorialses
     public function actualizar($id,$datos){
       $this->db->where("id_edi_fry",$id);
       return $this->db->update("editorials",$datos);
     }

   }//Cierre de la clase (No borrar)
