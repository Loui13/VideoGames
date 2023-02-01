<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Juegos extends CI_Controller
{
  //definiendo el constructor de la clase
  public function __construct()
  {
    parent::__construct();
    $this->load->model("juego");
    $this->load->model("categoria");
  }

  public function index()
  {
    $data["listadoJuegos"] = $this->juego->obtenerTodos();
    $data["categorias"] = $this->categoria->obtenerTodos();
    $this->load->view("header");
    $this->load->view("juegos/index", $data);
    $this->load->view("footer");
  }
  // renderiza la vista de nuevo estudiante
  public function nuevo()
  {
    $this->load->view('header');
    $this->load->view('juegos/nuevo');
    $this->load->view('footer');
  }
  public function guardar()
  {
    $datosJuego = array(
      "nombre_jue_fry" => $this->input->post("nombre_jue_fry"),
      "descripcion_jue_fry" => $this->input->post("descripcion_jue_fry"),
    );

    if ($this->juego->insertar($datosJuego)) {
      $resultado = array(
        "estado" => "ok",
        "mensaje" => "Nuevo juego ingresado correctamente"
      );
    } else {
      $resultado = array(
        "estado" => "error"
      );
    }
    echo json_encode($resultado);
  }
  //?funcion para consultar juegos en formato json
  public function listado()
  {
    $data["juegos"] = $this->juego->obtenerTodos();
    $this->load->view("juegos/listado", $data);
  }

  //funcion para capturar los valores de formulario Nuevo
  public function procesarActualizacion()
  {
    $datosJuegoEditado = array(
      "nombre_jue_fry" => $this->input->post('nombre_jue_fry'),
      "descripcion_jue_fry" => $this->input->post('descripcion_jue_fry'),

    );
    //para imprimir el array
    $id = $this->input->post('id_jue_fry');
    if ($this->juego->actualizar($id, $datosJuegoEditado)) {
      $this->session->set_flashdata('confirmacion', 'juego actualizar exitosamente');
    } else {
      $this->session->set_flashdata('error', 'Error al actualizar, verifique e intente de nuevo');
    }
    redirect('juegos/index');
  }
  //funcion para eliminar JUEGO
  public function borrar($id_jue_fry)
  { //puede llamarse como quiera
    if ($this->juego->eliminarPorId($id_jue_fry)) { //juego es el modelo
      $this->session->set_flashdata('confirmacion', 'juego eliminado exitosamente');
    } else {
      $this->session->set_flashdata('error', 'Error al eliminar, verifique e intente de nuevo');
    }
    redirect('juegos/index');
  }
}//cierre de la clase
