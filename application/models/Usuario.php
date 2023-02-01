<?php
   class Usuario extends CI_Model
   {
     function __construct()
     {
       parent::__construct();
     }
     //Funcion que consulta un usuario por Email y Password
     public function obtenerPorEmailPassword($email,$password){
        $this->db->where("email_usu_fry",$email);
        $this->db->where("password_usu_fry",$password);
        $usuario=$this->db->get("usuario");
        if ($usuario->num_rows()>0) {
          return $usuario->row();
        } else {
          return false;//cuando no hay datos
        }
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
     //funcion para eliminar un profesor se recibe el id
     public function eliminarPorId($id){
        $this->db->where("id_jue_fry",$id);
        return $this->db->delete("juego");
     }
     //Consultando el profesor por su id
     public function obtenerPorId($id){
        $this->db->where("id_jue_fry",$id);
        $juego=$this->db->get("juego");
        if($juego->num_rows()>0){
          return $juego->row();//xq solo hay uno
        }else{
          return false;
        }
     }
     //Proceso de actualizacion de profesores
     public function actualizar($id,$datos){
       $this->db->where("id_jue_fry",$id);
       return $this->db->update("juego",$datos);
     }

   }//Cierre de la clase (No borrar)
