<?php
   class Contacto extends CI_Model
   {
     function __construct()
     {
       parent::__construct();
     }
     public function insertar($datos){
        return $this->db->insert("contacto",$datos);
     }
     //Funcion que consulta todos los contactoes de la bdd
     public function obtenerTodos(){
        $contactos=$this->db->get("contacto");
        if ($contactos->num_rows()>0) {
          return $contactos;
        } else {
          return false;//cuando no hay datos
        }
     }
     //editar
     public function editar($id_con_fry,$data){
        $this->db->where("id_con_fry",$id_con_fry);
        return $this->db->update("contacto",$data);
     }


     //funcion para eliminar un contacto se recibe el id
     public function eliminarPorId($id){
        $this->db->where("id_con_fry",$id);
        return $this->db->delete("contacto");
     }
     //Consultando el contacto por su id
     public function obtenerPorId($id_con_fry){
        $this->db->where("id_con_fry",$id_con_fry);
        $contacto=$this->db->get("contacto");
        if($contacto->num_rows()>0){
          return $contacto->row();//xq solo hay uno
        }else{
          return false;
        }
     }
     //Proceso de actualizacion de contactoes
     public function actualizar($id,$datos){
       $this->db->where("id_con_fry",$id);
       return $this->db->update("contacto",$datos);
     }

   }//Cierre de la clase (No borrar)
