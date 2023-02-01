<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categorias extends CI_Controller
{
    //definiendo el constructor de la clase
    public function __construct()
    {
        parent::__construct();
        $this->load->model("categoria");
    }

    public function index()
    {
        $this->load->view("header");
        $this->load->view("categorias/index");
        $this->load->view("footer");
    }

    public function guardar()
    {
        $datosCategoria = array(
            "nombre_cat_fry" => $this->input->post("nombre_cat_fry"),
            "descripcion_cat_fry" => $this->input->post("descripcion_cat_fry"),
        
        );

        if ($this->categoria->insertar($datosCategoria)) {
            $resultado1 = array("estado" => "ok","mensaje" => "categoria ingresado correctamente");
        } else {
            $resultado1  = array(
                "estado" => "error"
            );
        }
        echo json_encode( array("estado" => "ok","mensaje" => "categoria ingresado correctamente") ); //json es entendido en todos los lenhuajes y la linea nos ayuda a recargar solo lo que necesitamos y no toda la app
    }

    public function editar()
    {
        $datosCategoria = array(
            "nombre_cat_fry" => $this->input->post("nombre_cat_fry"),
            "descripcion_cat_fry" => $this->input->post("descripcion_cat_fry"),
        
        );

        if ($this->categoria->insertar($datosCategoria)) {
            $resultado1 = array("estado" => "ok","mensaje" => "categoria ingresado correctamente");
        } else {
            $resultado1  = array(
                "estado" => "error"
            );
        }
        echo json_encode( array("estado" => "ok","mensaje" => "categoria ingresado correctamente") ); //json es entendido en todos los lenhuajes y la linea nos ayuda a recargar solo lo que necesitamos y no toda la app
    }


    //eliminar con ajax
    public function borrar()
    {

        $id_cat_fry = $this->input->post("id_cat_fry");
        if ($this->categoria->eliminarPorId($id_cat_fry)) {
            echo json_encode(
                array(
                    "estado" => "ok",
                    "mensaje" => "Congifuracion eliminada existosamente"
                )
            );
        } else {

            echo json_encode(array("estado" => "error"));
        }
    }

    //funcion para consultar categorias en formato Json
    public function listado() //funcion consultar debe ser la misma que el archivo
    {
        $data["categorias"] = $this->categoria->obtenerTodos(); //va al modelo a consultar los categorias
        $this->load->view("categorias/listado", $data); //<-archivo 'listado'

    }
}//cierre de la clase
