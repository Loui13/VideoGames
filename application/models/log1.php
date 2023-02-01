<?php
   class Log1 extends CI_Model
   {
     function __construct()
     {
       parent::__construct();
     }
     public function insertar($datos){
        return $this->db->insert("log",$datos);
     }

     public function obtenerPorId($id){
        $this->db->where("id_log_fry",$id);
        $producto=$this->db->get("log");
        if($producto->num_rows()>0){
          return $producto->row();//xq solo hay uno
        }else{
          return false;
        }
     }
   }//Cierre de la clase (No borrar)