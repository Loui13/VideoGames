<?php
class Categoria extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  public function insertar($datos)
  {
    return $this->db->insert("categoria", $datos);
  }
  //Funcion que consulta todos los categoriaes de la bdd
  public function obtenerTodos()
  {
    $categorias = $this->db->get("categoria");
    if ($categorias->num_rows() > 0) {
      return $categorias;
    } else {
      return false; //cuando no hay datos
    }
  }
  //funcion para eliminar un categoria se recibe el id
  public function eliminarPorId($id)
  {
    $this->db->where("id_cat_fry", $id);
    return $this->db->delete("categoria");
  }
  //Consultando el categoria por su id
  public function obtenerPorId($id)
  {
    $this->db->where("id_cat_fry", $id);
    $categoria = $this->db->get("categoria");
    if ($categoria->num_rows() > 0) {
      return $categoria->row(); //xq solo hay uno
    } else {
      return false;
    }
  }
  //Proceso de actualizacion de categorias
  public function editar($id, $datos)
  {
    $this->db->where("id_cat_fry", $id);
    return $this->db->update("categoria", $datos);
  }
}//Cierre de la clase (No borrar)
