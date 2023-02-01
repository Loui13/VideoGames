<?php
   class Sucursal extends CI_Model
   {
     function __construct()
     {
       parent::__construct();
     }
     public function insertar($datos){
        return $this->db->insert("sucursal",$datos);
     }
     //Funcion que consulta todos los sucursales de la bdd
     public function obtenerTodos(){
        $sucursales=$this->db->get("sucursal");
        if ($sucursales->num_rows()>0) {
          return $sucursales;
        } else {
          return false;//cuando no hay datos
        }
     }
     //funcion para eliminar un sucursal se recibe el id
     public function eliminarPorId($id){
        $this->db->where("id_suc_fry",$id);
        return $this->db->delete("sucursal");
     }
     //Consultando el sucursal por su id
     public function obtenerPorId($id){
        $this->db->where("id_suc_fry",$id);
        $sucursal=$this->db->get("sucursal");
        if($sucursal->num_rows()>0){
          return $sucursal->row();//xq solo hay uno
        }else{
          return false;
        }
     }
     //Proceso de actualizacion de sucursales
     public function actualizar($id,$datos){
       $this->db->where("id_suc_fry",$id);
       return $this->db->update("sucursal",$datos);
     }

   }//Cierre de la clase (No borrar)
