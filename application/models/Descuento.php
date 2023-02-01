<?php
   class Descuento extends CI_Model
   {
     function __construct()
     {
       parent::__construct();
     }
     public function insertar($datos){
        return $this->db->insert("descuento",$datos);
     }
     //Funcion que consulta todos los descuentoes de la bdd
     public function obtenerTodos(){
        $descuentos=$this->db->get("descuento");
        if ($descuentos->num_rows()>0) {
          return $descuentos;
        } else {
          return false;//cuando no hay datos
        }
     }
     //funcion para eliminar un descuento se recibe el id
     public function eliminarPorId($id){
        $this->db->where("id_des_fry",$id);
        return $this->db->delete("descuento");
     }
     //Consultando el descuento por su id
     public function obtenerPorId($id){
        $this->db->where("id_des_fry",$id);
        $descuento=$this->db->get("descuento");
        if($descuento->num_rows()>0){
          return $descuento->row();//xq solo hay uno
        }else{
          return false;
        }
     }
     //Proceso de actualizacion de descuentoes
     public function actualizar($id,$datos){
       $this->db->where("id_des_fry",$id);
       return $this->db->update("descuento",$datos);
     }

   }//Cierre de la clase (No borrar)
